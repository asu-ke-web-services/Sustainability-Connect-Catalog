<?php

namespace SCCatalog\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\SCCatalog\Contracts\Repository\AddressRepositoryContract::class, \SCCatalog\Repositories\AddressRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\CategoryRepositoryContract::class, \SCCatalog\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\InternshipRepositoryContract::class, \SCCatalog\Repositories\InternshipRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\KeywordRepositoryContract::class, \SCCatalog\Repositories\KeywordRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\OpportunityRepositoryContract::class, \SCCatalog\Repositories\OpportunityRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\OpportunityStatusRepositoryContract::class, \SCCatalog\Repositories\OpportunityStatusRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\OpportunityTypeRepositoryContract::class, \SCCatalog\Repositories\OpportunityTypeRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\OrganizationStatusRepositoryContract::class, \SCCatalog\Repositories\OrganizationStatusRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\OrganizationTypeRepositoryContract::class, \SCCatalog\Repositories\OrganizationTypeRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\ProjectRepositoryContract::class, \SCCatalog\Repositories\ProjectRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\StudentDegreeLevelRepositoryContract::class, \SCCatalog\Repositories\StudentDegreeLevelRepositoryEloquent::class);
        //:end-bindings:
    }
}
