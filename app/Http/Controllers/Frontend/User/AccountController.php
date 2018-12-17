<?php

namespace SCCatalog\Http\Controllers\Frontend\User;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Backend\Lookup\UserTypeRepository;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @param UserTypeRepository $userTypeRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(UserTypeRepository $userTypeRepository)
    {
        return view('frontend.user.account')
            ->with('userTypes', $userTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }
}
