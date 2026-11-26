<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ClientProfileTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    /** @return array{0: User, 1: Client} */
    private function makeClient(string $email): array
    {
        $user = User::create([
            'name' => 'Pemilik '.$email,
            'email' => $email,
            'password' => 'password123',
            'role' => 'client',
            'status' => 'active',
        ]);

        $client = Client::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'slug' => 'usaha-'.uniqid(),
            'phone' => '081234567890',
            'business_name' => 'Usaha '.$email,
            'bank_name' => 'BCA',
            'bank_account_number' => '1234567890',
            'bank_account_holder' => 'Pemilik',
            'service_area' => 'Banyuwangi',
            'status' => 'active',
        ]);

        return [$user, $client];
    }

    private function payload(array $override = []): array
    {
        return array_merge([
            'business_name' => 'CleanNow',
            'phone' => '081234567891',
            'email' => 'cleannow@example.com',
            'service_area' => 'Banyuwangi',
        ], $override);
    }

    public function test_client_can_view_own_profile(): void
    {
        [$user, $client] = $this->makeClient('a@example.com');

        $this->actingAs($user)
            ->get(route('client.profile.edit', ['client' => $client->id]))
            ->assertOk()
            ->assertSee('Profil Bisnis');
    }

    public function test_client_can_update_profile(): void
    {
        [$user, $client] = $this->makeClient('a@example.com');

        $this->actingAs($user)
            ->put(route('client.profile.update', ['client' => $client->id]), $this->payload())
            ->assertRedirect();

        $this->assertDatabaseHas('clients', ['id' => $client->id, 'business_name' => 'CleanNow']);
        $this->assertDatabaseHas('users', ['id' => $user->id, 'email' => 'cleannow@example.com']);
    }

    public function test_client_can_upload_avatar_as_webp(): void
    {
        Storage::fake('public');
        [$user, $client] = $this->makeClient('a@example.com');

        $this->actingAs($user)
            ->put(route('client.profile.update', ['client' => $client->id]), $this->payload([
                'avatar' => UploadedFile::fake()->image('foto.jpg', 600, 400),
            ]))
            ->assertRedirect();

        $path = $client->fresh()->avatar_path;
        $this->assertNotNull($path);
        $this->assertStringEndsWith('.webp', $path);
        Storage::disk('public')->assertExists($path);
    }

    public function test_client_cannot_access_other_clients_profile(): void
    {
        [$userA] = $this->makeClient('a@example.com');
        [, $clientB] = $this->makeClient('b@example.com');

        $this->actingAs($userA)
            ->get(route('client.profile.edit', ['client' => $clientB->id]))
            ->assertForbidden();

        $this->actingAs($userA)
            ->put(route('client.profile.update', ['client' => $clientB->id]), $this->payload())
            ->assertForbidden();
    }

    public function test_email_must_be_unique_and_phone_valid(): void
    {
        [$userA, $clientA] = $this->makeClient('a@example.com');
        $this->makeClient('b@example.com');

        $this->actingAs($userA)
            ->put(route('client.profile.update', ['client' => $clientA->id]), $this->payload([
                'email' => 'b@example.com',
                'phone' => 'abc',
            ]))
            ->assertSessionHasErrors(['email', 'phone']);
    }
}
