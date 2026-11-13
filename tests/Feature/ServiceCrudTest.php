<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceCrudTest extends TestCase
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

    private function makeService(Client $client): Service
    {
        return Service::create([
            'client_id' => $client->id,
            'name' => 'Cuci Sofa',
            'category' => 'Rumah',
            'description' => 'Pembersihan sofa',
            'base_price' => 150000,
            'is_active' => true,
        ]);
    }

    public function test_client_can_create_service(): void
    {
        [$user, $client] = $this->makeClient('a@example.com');

        $this->actingAs($user)
            ->post(route('client.services.store', ['client' => $client->id]), [
                'name' => 'Cuci Karpet',
                'category' => 'Rumah',
                'description' => 'Pembersihan karpet',
                'base_price' => 200000,
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('services', [
            'client_id' => $client->id,
            'name' => 'Cuci Karpet',
        ]);
    }

    public function test_client_cannot_open_another_clients_area(): void
    {
        [$userA] = $this->makeClient('a@example.com');
        [, $clientB] = $this->makeClient('b@example.com');

        $this->actingAs($userA)
            ->get(route('client.services.index', ['client' => $clientB->id]))
            ->assertForbidden();
    }

    public function test_client_cannot_edit_another_clients_service(): void
    {
        [$userA, $clientA] = $this->makeClient('a@example.com');
        [, $clientB] = $this->makeClient('b@example.com');
        $serviceB = $this->makeService($clientB);

        $this->actingAs($userA)
            ->get(route('client.services.edit', ['client' => $clientA->id, 'service' => $serviceB->id]))
            ->assertNotFound();
    }

    public function test_client_can_toggle_and_delete_own_service(): void
    {
        [$user, $client] = $this->makeClient('a@example.com');
        $service = $this->makeService($client);

        $this->actingAs($user)
            ->post(route('client.services.toggle', ['client' => $client->id, 'service' => $service->id]))
            ->assertRedirect();
        $this->assertFalse($service->fresh()->is_active);

        $this->actingAs($user)
            ->delete(route('client.services.destroy', ['client' => $client->id, 'service' => $service->id]))
            ->assertRedirect();
        $this->assertSoftDeleted('services', ['id' => $service->id]);
    }

    // /**
    //  * A basic feature test example.
    //  */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
