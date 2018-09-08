<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all'     => 'All',
        'yes'     => 'Yes',
        'no'      => 'No',
        'copyright' => 'Copyright',
        'custom'  => 'Custom',
        'actions' => 'Actions',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Save',
            'update' => 'Update',
        ],
        'hide'              => 'Hide',
        'inactive'          => 'Inactive',
        'none'              => 'None',
        'show'              => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions'     => 'Permissions',
                    'role'            => 'Role',
                    'sort'            => 'Sort',
                    'total'           => 'role total|roles total',
                ],
            ],

            'users' => [
                'active'              => 'Active Users',
                'all_permissions'     => 'All Permissions',
                'change_password'     => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create'              => 'Create User',
                'deactivated'         => 'Deactivated Users',
                'deleted'             => 'Deleted Users',
                'edit'                => 'Edit User',
                'management'          => 'User Management',
                'no_permissions'      => 'No Permissions',
                'no_roles'            => 'No Roles to set.',
                'permissions'         => 'Permissions',

                'table' => [
                    'confirmed'      => 'Confirmed',
                    'created'        => 'Created',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Last Updated',
                    'name'           => 'Name',
                    'first_name'     => 'First Name',
                    'last_name'      => 'Last Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted'     => 'No Deleted Users',
                    'other_permissions' => 'Other Permissions',
                    'permissions' => 'Permissions',
                    'roles'          => 'Roles',
                    'social' => 'Social',
                    'total'          => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmed',
                            'created_at'   => 'Created At',
                            'deleted_at'   => 'Deleted At',
                            'email'        => 'E-mail',
                            'last_login_at' => 'Last Login At',
                            'last_login_ip' => 'Last Login IP',
                            'last_updated' => 'Last Updated',
                            'name'         => 'Name',
                            'first_name'   => 'First Name',
                            'last_name'    => 'Last Name',
                            'status'       => 'Status',
                            'timezone'     => 'Timezone',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],

        'opportunity' => [
            'projects' => [
                'active'              => 'Active Projects',
                'create'              => 'Create Project',
                'deactivated'         => 'Deactivated Projects',
                'deleted'             => 'Deleted Projects',
                'edit'                => 'Edit Project',
                'management'          => 'Project Management',

                'table' => [
                    'created'              => 'Created',
                    'id'                   => 'ID',
                    'last_updated'         => 'Last Updated',
                    'name'                 => 'Name',
                    'status'               => 'Status',
                    'location'             => 'Location',
                    'start_date'           => 'Start Date',
                    'application_deadline' => 'Apply By',
                    'no_deactivated'       => 'No Deactivated Projects',
                    'no_deleted'           => 'No Deleted Projects',
                    'total'                => 'project total|projects total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'name'                      => 'Name',
                            'public_name'               => 'Public Name',
                            'description'               => 'Description',
                            'status'                    => 'Status',
                            'review_status'             => 'Review Status',
                            'start_date'                => 'Start Date',
                            'end_date'                  => 'End Date',
                            'listing_starts'            => 'Listing Starts',
                            'listing_ends'              => 'Listing Ends',
                            'application_deadline'      => 'Application Deadline Date',
                            'application_deadline_text' => 'Application Deadline Text',
                            'created_at'                => 'Created At',
                            'deleted_at'                => 'Deleted At',
                            'last_updated'              => 'Last Updated',
                        ],
                    ],
                ],

                'view' => 'View Project',
            ],

            'internships' => [
                'active'              => 'Active Internships',
                'create'              => 'Create Internship',
                'deactivated'         => 'Deactivated Internships',
                'deleted'             => 'Deleted Internships',
                'edit'                => 'Edit Internship',
                'management'          => 'Internship Management',

                'table' => [
                    'created'              => 'Created',
                    'id'                   => 'ID',
                    'last_updated'         => 'Last Updated',
                    'name'                 => 'Name',
                    'status'               => 'Status',
                    'location'             => 'Location',
                    'start_date'           => 'Start Date',
                    'application_deadline' => 'Apply By',
                    'no_deactivated'       => 'No Deactivated Internships',
                    'no_deleted'           => 'No Deleted Internships',
                    'total'                => 'internship total|internships total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'name'                      => 'Name',
                            'public_name'               => 'Public Name',
                            'description'               => 'Description',
                            'status'                    => 'Status',
                            'start_date'                => 'Start Date',
                            'end_date'                  => 'End Date',
                            'listing_starts'            => 'Listing Starts',
                            'listing_ends'              => 'Listing Ends',
                            'application_deadline'      => 'Application Deadline Date',
                            'application_deadline_text' => 'Application Deadline Text',
                            'created_at'                => 'Created At',
                            'deleted_at'                => 'Deleted At',
                            'last_updated'              => 'Last Updated',
                        ],
                    ],
                ],

                'view' => 'View Internship',
            ],
        ],

    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Login',
            'login_button'       => 'Login',
            'login_with'         => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button'    => 'Register',
            'remember_me'        => 'Remember Me',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'expired_password_box_title' => 'Your password has expired.',
            'forgot_password'                 => 'Forgot Your Password?',
            'reset_password_box_title'        => 'Reset Password',
            'reset_password_button'           => 'Reset Password',
            'update_password_button'           => 'Update Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Created At',
                'edit_information'   => 'Edit Information',
                'email'              => 'E-mail',
                'last_updated'       => 'Last Updated',
                'name'               => 'Name',
                'first_name'         => 'First Name',
                'last_name'          => 'Last Name',
                'update_information' => 'Update Information',
            ],
        ],

    ],
];
