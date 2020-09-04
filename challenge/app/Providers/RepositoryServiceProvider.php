<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\HookahRepository;
use App\Repositories\Contracts\HookahRepositoryInterface;
use App\Repositories\ReservationRepository;
use App\Repositories\Contracts\ReservationRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->app->bind(HookahRepositoryInterface::class, HookahRepository::class);
        $this->app->bind(ReservationRepositoryInterface::class, ReservationRepository::class);
    }

    public function register()
    {
        //
    }
}
