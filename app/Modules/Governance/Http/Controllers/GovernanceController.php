<?php

namespace App\Modules\Governance\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use App\Modules\Governance\Notifications\ClientReviewed;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GovernanceController extends Controller
{
    /**
     * Daftar mitra klien.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status');

        $clients = Client::with('user')
            ->when(in_array($status, ['pending', 'active', 'suspended', 'rejected'], true), fn ($q) => $q->where('status', $status))
            ->latest()
            ->get();

        $counts = Client::query()->selectRaw('status, count(*) as total')->groupBy('status')->pluck('total', 'status');

        return view('governance::index', compact('clients', 'counts', 'status'));
    }

    /**
     * Form pendaftaran mitra oleh admin.
     */
    public function create(): View
    {
        return view('governance::create');
    }

    /**
     * Admin mendaftarkan mitra baru (setelah kontrak ditandatangani di kantor).
     * Membuat akun login (users) dan profil mitra (clients) sekaligus.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'business_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'service_area' => ['required', 'string', 'max:255'],
            'ktp_number' => ['nullable', 'string', 'max:32'],
            'description' => ['nullable', 'string'],
            'bank_name' => ['required', 'string', 'max:255'],
            'bank_account_number' => ['required', 'string', 'max:64'],
            'bank_account_holder' => ['required', 'string', 'max:255'],
        ]);

        DB::transaction(function () use ($data): void {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'role' => 'client',
                'status' => 'active',
            ]);

            Client::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'slug' => $this->uniqueSlug($data['business_name']),
                'phone' => $data['phone'],
                'ktp_number' => $data['ktp_number'] ?? null,
                'business_name' => $data['business_name'],
                'bank_name' => $data['bank_name'],
                'bank_account_number' => $data['bank_account_number'],
                'bank_account_holder' => $data['bank_account_holder'],
                'description' => $data['description'] ?? null,
                'service_area' => $data['service_area'],
                'status' => 'active',
            ]);
        });

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Mitra berhasil didaftarkan. Akun login mitra sudah aktif.');
    }

    /**
     * Verifikasi mitra (pending -> active).
     */
    public function verifyClient(Client $client): RedirectResponse
    {
        $client->update([
            'status' => 'active',
            'rejection_reason' => null,
            'reviewed_at' => now(),
        ]);
        $client->user?->update(['status' => 'active']);

        $terkirim = $this->beriTahu($client, true);

        return back()->with('success', 'Mitra berhasil diverifikasi'.($terkirim ? ' dan diberi tahu lewat email.' : ', tetapi email gagal dikirim.'));
    }

    /**
     * Tolak pendaftaran mitra beserta alasannya.
     */
    public function rejectClient(Request $request, Client $client): RedirectResponse
    {
        $data = $request->validate([
            'reason' => ['required', 'string', 'min:5', 'max:500'],
        ]);

        $client->update([
            'status' => 'rejected',
            'rejection_reason' => $data['reason'],
            'reviewed_at' => now(),
        ]);
        $client->user?->update(['status' => 'rejected']);

        $terkirim = $this->beriTahu($client, false, $data['reason']);

        return back()->with('success', 'Pendaftaran mitra ditolak'.($terkirim ? ' dan mitra diberi tahu lewat email.' : ', tetapi email gagal dikirim.'));
    }

    /**
     * Kirim email hasil verifikasi. Kegagalan kirim tidak boleh menggagalkan keputusan admin.
     */
    private function beriTahu(Client $client, bool $disetujui, ?string $alasan = null): bool
    {
        if (! $client->user) {
            return false;
        }

        try {
            $client->user->notify(new ClientReviewed($client, $disetujui, $alasan));

            return true;
        } catch (\Throwable $e) {
            report($e);

            return false;
        }
    }

    /**
     * Aktifkan / nonaktifkan mitra. Status akun login ikut disamakan.
     */
    public function toggleClientStatus(Client $client): RedirectResponse
    {
        $baru = $client->status === 'active' ? 'suspended' : 'active';

        $client->update(['status' => $baru]);
        $client->user?->update(['status' => $baru]);

        return back()->with('success', $baru === 'active' ? 'Mitra diaktifkan.' : 'Mitra dinonaktifkan.');
    }

    private function uniqueSlug(string $nama): string
    {
        $dasar = Str::slug($nama) ?: 'mitra';
        $slug = $dasar;
        $i = 2;

        while (Client::where('slug', $slug)->exists()) {
            $slug = $dasar.'-'.$i++;
        }

        return $slug;
    }
}
