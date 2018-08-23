<?php

namespace SCCatalog\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        Paginator::useBootstrapThree();

        Relation::morphMap([
            'Internship'   => \SCCatalog\Models\Internship::class,
            'Opportunity'  => \SCCatalog\Models\Opportunity::class,
            'Organization' => \SCCatalog\Models\Organization::class,
            'Project'      => \SCCatalog\Models\Project::class,
        ]);

        if(env('ENFORCE_SSL', false)) {
            $url->forceScheme('https');
        }
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
