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
        if (auth()->user() !== null) {
            $submittedProjects = auth()->user()->submittedProjects;
            $submittedInternships = auth()->user()->submittedInternships;
            $followedProjects = auth()->user()->followedProjects;
            $followedInternships = auth()->user()->followedInternships;
            $participatingInProjects = auth()->user()->participatingInProjects;
            $participatingInInternships = auth()->user()->participatingInInternships;
            $projectApplications = auth()->user()->projectApplications;
            $internshipApplications = auth()->user()->internshipApplications;
        }

        return view('frontend.user.dashboard')
            ->with('submittedProjects', $submittedProjects)
            ->with('submittedInternships', $submittedInternships)
            ->with('followedProjects', $followedProjects)
            ->with('followedInternships', $followedInternships)
            ->with('participatingInProjects', $participatingInProjects)
            ->with('participatingInInternships', $participatingInInternships)
            ->with('projectApplications', $projectApplications)
            ->with('internshipApplications', $internshipApplications);
    }
}
