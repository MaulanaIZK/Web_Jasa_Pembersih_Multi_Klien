<?php

namespace App\Policies;

use App\Models\Service;
use App\Models\User;

class ServicePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'client' && $user->client !== null;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->viewAny($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Service $service): bool
    {
        return $this->viewAny($user) 
            && (int) $user->client->id === $service->client_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Service $service): bool
    {
        return $this->update($user, $service);
    }
}
