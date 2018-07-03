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
        $this->app->bind(\SCCatalog\Contracts\Repositories\AddressRepositoryContract::class, \SCCatalog\Repositories\AddressRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repositories\CategoryRepositoryContract::class, \SCCatalog\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repositories\InternshipRepositoryContract::class, \SCCatalog\Repositories\InternshipRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repositories\KeywordRepositoryContract::class, \SCCatalog\Repositories\KeywordRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repositories\OpportunityRepositoryContract::class, \SCCatalog\Repositories\OpportunityRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repositories\OpportunityStatusRepositoryContract::class, \SCCatalog\Repositories\OpportunityStatusRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repositories\OpportunityTypeRepositoryContract::class, \SCCatalog\Repositories\OpportunityTypeRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repositories\OrganizationStatusRepositoryContract::class, \SCCatalog\Repositories\OrganizationStatusRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repositories\OrganizationTypeRepositoryContract::class, \SCCatalog\Repositories\OrganizationTypeRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repositories\ProjectRepositoryContract::class, \SCCatalog\Repositories\ProjectRepositoryEloquent::class);
        $this->app->bind(\SCCatalog\Contracts\Repositories\StudentDegreeLevelRepositoryContract::class, \SCCatalog\Repositories\StudentDegreeLevelRepositoryEloquent::class);
        //:end-bindings:
    }
}
