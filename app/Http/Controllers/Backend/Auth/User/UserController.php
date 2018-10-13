<?php

namespace SCCatalog\Http\Controllers\Backend\Auth\User;

use SCCatalog\Models\Auth\User;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Backend\Auth\User\UserDeleted;
use SCCatalog\Repositories\Backend\Auth\RoleRepository;
use SCCatalog\Repositories\Backend\Auth\UserRepository;
use SCCatalog\Repositories\Backend\Auth\PermissionRepository;
use SCCatalog\Http\Requests\Backend\Auth\User\StoreUserRequest;
use SCCatalog\Http\Requests\Backend\Auth\User\ManageUserRequest;
use SCCatalog\Http\Requests\Backend\Auth\User\UpdateUserRequest;
use SCCatalog\Repositories\Backend\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Backend\Lookup\StudentDegreeLevelRepository;
use SCCatalog\Repositories\Backend\Lookup\UserTypeRepository;
use SCCatalog\Repositories\Backend\Organization\OrganizationRepository;

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
        return view('backend.auth.user.index')
            ->withUsers($this->userRepository->getActivePaginated(25, 'id', 'asc'));
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
    )
    {
        return view('backend.auth.user.create')
            ->with('affiliations', $affiliationRepository->where('opportunity_type_id', 1)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('studentDegreeLevels', $studentDegreeLevelRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('userTypes', $userTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->only(
            'first_name',
            'last_name',
            'email',
            'password',
            'active',
            'confirmed',
            'confirmation_email',
            'roles',
            'permissions',
            'user_type_id',
            'student_degree_level_id',
            'degree_program',
            'graduation_date',
            'phone',
            'research_interests',
            'department',
            'organization_id',
            'affiliations'
        ));

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
        // $user->load(
        //     // 'affiliations',
        //     'organization',
        //     'studentDegreeLevel',
        //     'userType'
        // );

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
    )
    {
        return view('backend.auth.user.edit')
            ->withUser($user)
            ->withRoles($roleRepository->get())
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withUserPermissions($user->permissions->pluck('name')->all())
            ->with('affiliations', $affiliationRepository->where('opportunity_type_id', 1)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('studentDegreeLevels', $studentDegreeLevelRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('userTypes', $userTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * @param UpdateUserRequest $request
     * @param User              $user
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userRepository->update($user, $request->only(
            'first_name',
            'last_name',
            'email',
            'roles',
            'permissions',
            'user_type_id',
            'student_degree_level_id',
            'degree_program',
            'graduation_date',
            'phone',
            'research_interests',
            'department',
            'organization_id',
            'affiliations'
        ));

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
