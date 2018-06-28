<?php

namespace SCCatalog\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\SCCatalog\Domain\Repositories\AddressRepository::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new \SCCatalog\Infrastructure\Repositories\DoctrineAddressRepository(
                $app['em'],
                $app['em']->getClassMetaData(\SCCatalog\Domain\Entities\Address::class)
            );
        });
    }
}
