<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Modules\Auth\Http\Requests\ClientProfileRequest;
use App\Modules\Auth\Services\AvatarStore;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ClientProfileController extends Controller
{
    use AuthorizesRequests;

    public function edit(Request $request): View
    {
        $client = $request->user()->client;
        abort_if($client === null, 403, 'Profil Client tidak ditemukan.');

        $this->authorize('view', $client);

        $client->load('user');

        return view('auth::client.profile', compact('client'));
    }

    public function update(ClientProfileRequest $request, AvatarStore $avatars): RedirectResponse
    {
        $client = $request->user()->client;
        abort_if($client === null, 403, 'Profil Client tidak ditemukan.');

        $this->authorize('update', $client);

        $data = $request->validated();
        $oldPath = $client->avatar_path;
        $newPath = $request->hasFile('avatar')
            ? $avatars->store($request->file('avatar'), $client->id)
            : null;

        DB::transaction(function () use ($client, $data, $newPath): void {
            $client->user->update(['email' => $data['email']]);

            $client->update([
                'business_name' => $data['business_name'],
                'phone' => $data['phone'],
                'service_area' => $data['service_area'],
                ...($newPath !== null ? ['avatar_path' => $newPath] : []),
            ]);
        });

        // Hapus foto lama hanya setelah data baru berhasil tersimpan.
        if ($newPath !== null) {
            $avatars->delete($oldPath);
        }

        return redirect()->route('client.profile.edit')
            ->with('success', 'Profil bisnis berhasil diperbarui!');
    }
}