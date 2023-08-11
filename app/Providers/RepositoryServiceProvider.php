<?php

namespace App\Providers;

use App\Repositories\BoxRepository;
use App\Repositories\Contracts\BoxRepositoryInterface;
use App\Repositories\Contracts\EmailRepositoryInterface;
use App\Repositories\Contracts\ServiceRepositoryInterface;
use App\Repositories\EmailRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        app()->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        app()->bind(EmailRepositoryInterface::class, EmailRepository::class);
        app()->bind(BoxRepositoryInterface::class, BoxRepository::class);
    }
}
