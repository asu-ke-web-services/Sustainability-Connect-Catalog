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
        return view('frontend.gentelella.dashboard.main');
    }
}
