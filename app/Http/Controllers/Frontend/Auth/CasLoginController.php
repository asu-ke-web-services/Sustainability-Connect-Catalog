<?php

namespace SCCatalog\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Frontend\Auth\UserLoggedIn;
use SCCatalog\Repositories\Auth\Frontend\UserRepository;
use SCCatalog\Helpers\Auth\AsuDirectoryHelper;

/**
 * Class CasLoginController.
 */
class CasLoginController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var AsuDirectoryHelper
     */
    protected $asuDirectoryHelper;

    /**
     * CasLoginController constructor.
     *
     * @param UserRepository  $userRepository
     * @param AsuDirectoryHelper $asuDirectoryHelper
     */
    public function __construct(UserRepository $userRepository, AsuDirectoryHelper $asuDirectoryHelper)
    {
        // $this->middleware('cas.auth');

        $this->userRepository = $userRepository;
        $this->asuDirectoryHelper = $asuDirectoryHelper;
    }

    /**
     * @param Request $request
     *
     * @throws GeneralException
     *
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function login(Request $request)
    {
        // There's a high probability something will go wrong
        $user = null;

        /*
         * The first time this is hit, request is empty
         * It's redirected to the provider and then back here, where request is populated
         * So it then continues creating the user
         */
        // if (! $request->all()) {
        //     return $this->getAuthorizationFirst();
        // }

        // dd(cas()->checkAuthentication());

        if (!cas()->checkAuthentication()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            }
            cas()->authenticate();
        }

        Log::channel('slack')->info('New sign-in - CAS User: '.cas()->getCurrentUser());

        // Create the user if this is a new social account or find the one that is already there.
        try {
            $user = $this->userRepository->findOrCreateASU(cas()->getCurrentUser());
        } catch (GeneralException $e) {
            return redirect()->route(home_route())->withFlashDanger($e->getMessage());
        }

        if ($user === null) {
            return redirect()->route(home_route())->withFlashDanger(__('exceptions.frontend.auth.unknown'));
        }

        // Check to see if they are active.
        if (!$user->isActive()) {
            throw new GeneralException(__('exceptions.frontend.auth.deactivated'));
        }

        // Account approval is on
        if ($user->isPending()) {
            throw new GeneralException(__('exceptions.frontend.auth.confirmation.pending'));
        }

        // User has been successfully created or already exists
        auth()->login($user, true);

        // Set session variable so we know which provider user is logged in as, if ever needed
        session([config('access.socialite_session_name') => 'AsuCas']);

        event(new UserLoggedIn(auth()->user()));

        // Return to the intended url or default to the class property
        return redirect()->intended(route(home_route()));
    }

    /**
     * @return mixed
     */
    protected function getAuthorizationFirst()
    {
        return cas()->authenticate();
    }
}
