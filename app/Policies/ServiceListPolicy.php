<?php

namespace App\Policies;

use App\Models\ProviderManager;
use App\Models\ServiceList;
use Illuminate\Auth\Access\Response;

class ServiceListPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(ProviderManager $providerManager): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(ProviderManager $providerManager, ServiceList $serviceList): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(ProviderManager $providerManager): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(ProviderManager $providerManager, ServiceList $serviceList): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(ProviderManager $providerManager, ServiceList $serviceList): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(ProviderManager $providerManager, ServiceList $serviceList): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(ProviderManager $providerManager, ServiceList $serviceList): bool
    {
        //
    }
}
