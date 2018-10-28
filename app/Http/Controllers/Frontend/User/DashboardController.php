<?php

namespace SCCatalog\Http\Controllers\Frontend\User;

use SCCatalog\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	if ( auth()->user() !== null ) {
            $accessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toJson();

            $followedOpportunities = auth()->user()->followedOpportunities;

            $activeOpportunities = auth()->user()->opportunities;

            $applications = auth()->user()->opportunityApplications;

        }

        return view('frontend.user.dashboard')
        	->with('followedOpportunities', $followedOpportunities)
        	->with('activeOpportunities', $activeOpportunities)
        	->with('applications', $applications);
    }
}
