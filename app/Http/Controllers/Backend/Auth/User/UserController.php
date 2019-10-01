<?php

namespace SCCatalog\Http\Controllers\Backend\Auth\User;

use SCCatalog\Models\Auth\User;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Backend\Auth\User\UserDeleted;
use SCCatalog\Repositories\Auth\Backend\RoleRepository;
use SCCatalog\Repositories\Auth\Backend\UserRepository;
use SCCatalog\Repositories\Auth\Backend\PermissionRepository;
use SCCatalog\Http\Requests\Backend\Auth\User\ManageUserRequest;
use SCCatalog\Repositories\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Lookup\StudentDegreeLevelRepository;
use SCCatalog\Repositories\Lookup\UserTypeRepository;
use SCCatalog\Repositories\Organization\OrganizationRepository;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageUserRequest $request)
    {
        $search = '';
        if ($request->has('search')) {
            $search = $request->get('search');
        }

        return view('backend.auth.user.all')
            ->withUsers($this->userRepository->getAllPaginated(25, $search, 'created_at', 'desc'))
            ->with('searchRequest', (object) ['search' => $search]);
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(
        ManageUserRequest $request,
        RoleRepository $roleRepository,
        PermissionRepository $permissionRepository,
        AffiliationRepository $affiliationRepository,
        OrganizationRepository $organizationRepository,
        StudentDegreeLevelRepository $studentDegreeLevelRepository,
        UserTypeRepository $userTypeRepository
    ) {
        return view('backend.auth.user.create')
            ->with('affiliations', $affiliationRepository->where('access_control', 1)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('studentDegreeLevels', $studentDegreeLevelRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('userTypes', $userTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(ManageUserRequest $request)
    {
        $this->userRepository->create($request->all());

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.created'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function show(ManageUserRequest $request, User $user)
    {
        $user->loadMissing(
            'affiliations',
            'organization',
            'studentDegreeLevel',
            'userType'
        );

        return view('backend.auth.user.show')
            ->withUser($user);
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     * @param User                 $user
     *
     * @return mixed
     */
    public function edit(
        ManageUserRequest $request,
        RoleRepository $roleRepository,
        PermissionRepository $permissionRepository,
        AffiliationRepository $affiliationRepository,
        OrganizationRepository $organizationRepository,
        StudentDegreeLevelRepository $studentDegreeLevelRepository,
        UserTypeRepository $userTypeRepository,
        User $user
    ) {
        return view('backend.auth.user.edit')
            ->withUser($user)
            ->withRoles($roleRepository->get())
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withUserPermissions($user->permissions->pluck('name')->all())
            ->with('affiliations', $affiliationRepository->where('access_control', 1)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('studentDegreeLevels', $studentDegreeLevelRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('userTypes', $userTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(ManageUserRequest $request, User $user)
    {
        $this->userRepository->update($user, $request->all());

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.updated'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageUserRequest $request, User $user)
    {
        $this->userRepository->deleteById($user->id);

        event(new UserDeleted($user));

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess(__('alerts.backend.users.deleted'));
    }
}
