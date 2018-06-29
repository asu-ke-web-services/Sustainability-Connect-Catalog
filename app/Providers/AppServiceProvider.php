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
        $this->app->bind(\SCCatalog\Contracts\Repository\AddressRepositoryContract::class, \SCCatalog\Repositories\AddressRepository::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\CategoryRepositoryContract::class, \SCCatalog\Repositories\CategoryRepository::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\InternshipRepositoryContract::class, \SCCatalog\Repositories\InternshipRepository::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\KeywordRepositoryContract::class, \SCCatalog\Repositories\KeywordRepository::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\OpportunityRepositoryContract::class, \SCCatalog\Repositories\OpportunityRepository::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\OpportunityStatusRepositoryContract::class, \SCCatalog\Repositories\OpportunityStatusRepository::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\OpportunityTypeRepositoryContract::class, \SCCatalog\Repositories\OpportunityTypeRepository::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\OrganizationStatusRepositoryContract::class, \SCCatalog\Repositories\OrganizationStatusRepository::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\OrganizationTypeRepositoryContract::class, \SCCatalog\Repositories\OrganizationTypeRepository::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\ProjectRepositoryContract::class, \SCCatalog\Repositories\ProjectRepository::class);
        $this->app->bind(\SCCatalog\Contracts\Repository\StudentDegreeLevelRepositoryContract::class, \SCCatalog\Repositories\StudentDegreeLevelRepository::class);
    }
}
