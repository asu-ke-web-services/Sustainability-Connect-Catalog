<?php

namespace SCCatalog\Http\Composers\Backend;

use Illuminate\View\View;
use SCCatalog\Repositories\Auth\Backend\UserRepository;

/**
 * Class SidebarComposer.
 */
class SidebarComposer
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * SidebarComposer constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        if (config('access.users.requires_approval')) {
            $view->with('pending_approval', $this->userRepository->getUnconfirmedCount());
        } else {
            $view->with('pending_approval', 0);
        }
    }
}
