<?php

namespace SCCatalog\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::morphMap([
            'Internship'   => \SCCatalog\Models\Internship::class,
            'Opportunity'  => \SCCatalog\Models\Opportunity::class,
            'Organization' => \SCCatalog\Models\Organization::class,
            'Project'      => \SCCatalog\Models\Project::class,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
