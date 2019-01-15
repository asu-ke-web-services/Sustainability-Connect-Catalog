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
        'all'       => 'All',
        'yes'       => 'Yes',
        'no'        => 'No',
        'copyright' => 'Copyright',
        'custom'    => 'Custom',
        'actions'   => 'Actions',
        'active'    => 'Active',
        'buttons'   => [
            'save'   => 'Save',
            'update' => 'Update',
        ],
        'hide'              => 'Hide',
        'inactive'          => 'Inactive',
        'more'              => 'More',
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
                'all'                 => 'All Users',
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
                    'confirmed'         => 'Confirmed',
                    'created'           => 'Created',
                    'email'             => 'E-mail',
                    'id'                => 'ID',
                    'last_updated'      => 'Last Updated',
                    'name'              => 'Name',
                    'first_name'        => 'First Name',
                    'last_name'         => 'Last Name',
                    'type'              => 'User Type',
                    'no_deactivated'    => 'No Deactivated Users',
                    'no_deleted'        => 'No Deleted Users',
                    'other_permissions' => 'Other Permissions',
                    'permissions'       => 'Permissions',
                    'roles'             => 'Roles',
                    'social'            => 'Social',
                    'total'             => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview'     => 'Overview',
                        'student'      => 'Student Details',
                        'faculty'      => 'Faculty Details',
                        'staff'        => 'Staff Details',
                        'professional' => 'Professional Details',
                        'history'      => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Profile Picture',
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
                        'student' => [
                            'student_degree_level' => 'Degree Level',
                            'degree_program'       => 'Degree Program',
                            'graduation_date'      => 'Graduation Date',
                            'phone'                => 'Phone',
                            'research_interests'   => 'Research Interests',
                        ],
                        'faculty' => [
                            'department'         => 'Department',
                            'phone'              => 'Phone',
                            'research_interests' => 'Research Interests',
                        ],
                        'staff' => [
                            'department' => 'Department',
                            'phone'      => 'Phone',
                        ],
                        'professional' => [
                            'organization' => 'Degree Level',
                            'phone'        => 'Phone',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],

        'opportunity' => [
            'projects' => [
                'all'                 => 'All Projects',
                'active'              => 'Active Project Listings',
                'expired'             => 'Expired Project Listings',
                'search'              => 'Search Projects',
                'create'              => 'Create Project',
                'completed'           => 'Completed Projects',
                'archived'            => 'Archived Projects',
                'deleted'             => 'Deleted Projects',
                'edit'                => 'Edit Project',
                'management'          => 'Project Management',
                'reviews'             => 'Project Proposals',
                'import_review'       => 'Imported Projects to Review',
                'accept_application'  => 'Accept Applications?',
                'project_details'     => 'Project Details',
                'locations'           => 'Locations',
                'applicant_details'   => 'Applicant Details',
                'application_process' => 'Application Process',

                'table' => [
                    'created'              => 'Created',
                    'id'                   => 'ID',
                    'last_updated'         => 'Last Updated',
                    'deleted_at'           => 'Deleted',
                    'created_at'           => 'Created',
                    'name'                 => 'Name',
                    'status'               => 'Status',
                    'location'             => 'Location',
                    'opportunity_start_at' => 'Project Starts',
                    'application_deadline_at' => 'Apply By',
                    'no_archived'          => 'No Archived Projects',
                    'no_deleted'           => 'No Deleted Projects',
                    'no_import_review'     => 'No Projects Need Cleanup Review',
                    'no_reviews'           => 'No Submission Reviews Needed',
                    'total'                => 'project total|projects total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'details' => 'Project Details',
                        'organization' => 'Sponsor Organization',
                        'people' => 'Related Users',
                        'attachments' => 'Uploaded Attachments',
                        'notes' => 'Notes',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'name'                        => 'Name',
                            'public_name'                 => 'Public Name',
                            'description'                 => 'Description',
                            'status'                      => 'Status',
                            'review_status'               => 'Review Status',
                            'opportunity_start_at'        => 'Project Starts',
                            'opportunity_end_at'          => 'Project Ends',
                            'listing_start_at'              => 'Listing Starts',
                            'listing_end_at'                => 'Listing Ends',
                            'application_deadline_at'     => 'Application Deadline Date',
                            'affiliations'                => 'Affiliations',
                            'categories'                  => 'Categories',
                            'keywords'                    => 'Keywords',
                            'location'                    => 'Location',
                            'location_city'               => 'City',
                            'location_state'              => 'State',
                            'location_country'            => 'Country',
                            'location_note'               => 'Note',
                            'created_at'                  => 'Created At',
                            'deleted_at'                  => 'Deleted At',
                            'last_updated'                => 'Last Updated',
                        ],
                        'details' => [
                            'implementation_paths'        => 'Envisioned Solution',
                            'sustainability_contribution' => 'Sustainability Contribution',
                            'qualifications'              => 'Qualifications',
                            'responsibilities'            => 'Responsibilities',
                            'learning_outcomes'           => 'Learning Outcomes',
                            'compensation'                => 'Compensation',
                            'budget_type'                 => 'Budget Type',
                            'budget_amount'               => 'Budget Amount',
                            'application_instructions'    => 'Application Instructions',
                            'success_story'               => 'Success Story',
                            'library_collection'          => 'Library Collection',
                            'parent_opportunity'          => 'Parent Opportunity',

                        ],
                        'organization' => [
                            'name'            => 'Organization Name',
                            'url'             => 'Web Address',
                        ],
                        'people' => [
                            'supervisor_user' => 'Project Supervisor',
                            'submitting_user' => 'Submitting User',
                            'program_lead'    => 'ASU Program Lead',
                            'participants'    => 'Participants',
                            'mentors'         => 'Mentors',
                            'followers'       => 'Followers',
                        ],
                        'attachments' => [

                        ],
                        'notes' => [

                        ],
                        'history' => [

                        ],
                    ],
                ],

                'view' => 'View Project',
            ],

            'internships' => [
                'all'                 => 'All Internships',
                'active'              => 'Active Internships',
                'create'              => 'Create Internship',
                'inactive'            => 'Inactive Internships',
                'deleted'             => 'Deleted Internships',
                'edit'                => 'Edit Internship',
                'import_review'       => 'Imported Internships to Review',
                'management'          => 'Internship Management',
                'accept_application'  => 'Accept Applications?',
                'internship_details'  => 'Internship Details',
                'locations'           => 'Locations',
                'applicant_details'   => 'Applicant Details',
                'application_process' => 'Application Process',

                'table' => [
                    'created'              => 'Created',
                    'id'                   => 'ID',
                    'last_updated'         => 'Last Updated',
                    'name'                 => 'Name',
                    'status'               => 'Status',
                    'location'             => 'Location',
                    'opportunity_start_at' => 'Internship Starts',
                    'application_deadline_at' => 'Apply By',
                    'no_deactivated'       => 'No Deactivated Internships',
                    'no_deleted'           => 'No Deleted Internships',
                    'total'                => 'internship total|internships total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'details' => 'Internship Details',
                        'organization' => 'Sponsor Organization',
                        'people' => 'Related Users',
                        'attachments' => 'Uploaded Attachments',
                        'notes' => 'Notes',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'name'                        => 'Name',
                            'description'                 => 'Description',
                            'status'                      => 'Status',
                            'opportunity_start_at'        => 'Internship Starts',
                            'opportunity_end_at'          => 'Internship Ends',
                            'listing_start_at'            => 'Listing Starts',
                            'listing_end_at'              => 'Listing Ends',
                            'application_deadline_at'     => 'Application Deadline Date',
                            'affiliations'                => 'Affiliations',
                            'categories'                  => 'Categories',
                            'keywords'                    => 'Keywords',
                            'location'                    => 'Location',
                            'location_city'               => 'City',
                            'location_state'              => 'State',
                            'location_country'            => 'Country',
                            'location_note'               => 'Note',
                            'created_at'                  => 'Created At',
                            'deleted_at'                  => 'Deleted At',
                            'last_updated'                => 'Last Updated',
                        ],
                        'details' => [
                            'implementation_paths'        => 'Envisioned Solution',
                            'sustainability_contribution' => 'Sustainability Contribution',
                            'qualifications'              => 'Qualifications',
                            'responsibilities'            => 'Responsibilities',
                            'learning_outcomes'           => 'Learning Outcomes',
                            'compensation'                => 'Compensation',
                            'budget_type'                 => 'Budget Type',
                            'budget_amount'               => 'Budget Amount',
                            'application_instructions'    => 'Application Instructions',
                            'success_story'               => 'Success Story',
                            'library_collection'          => 'Library Collection',
                            'parent_opportunity'          => 'Parent Opportunity',

                        ],
                        'organization' => [
                            'name'            => 'Organization Name',
                            'url'             => 'Web Address',
                        ],
                        'people' => [
                            'supervisor_user' => 'Internship Supervisor',
                            'submitting_user' => 'Submitting User',
                            'program_lead'    => 'ASU Program Lead',
                            'participants'    => 'Participants',
                            'mentors'         => 'Mentors',
                            'followers'       => 'Followers',
                        ],
                        'attachments' => [

                        ],
                        'notes' => [

                        ],
                        'history' => [

                        ],
                    ],
                ],

                'view' => 'View Internship',
            ],
        ],

        'organization' => [
            'all'        => 'All Organizations',
            'active'     => 'Active Organizations',
            'inactive'   => 'Inactive Organizations',
            'search'     => 'Search Organizations',
            'create'     => 'Create Organization',
            'archived'   => 'Archived Organizations',
            'deleted'    => 'Deleted Organizations',
            'edit'       => 'Edit Organization',
            'management' => 'Organization Management',
            'details'    => 'Organization Details',
            'locations'  => 'Locations',

            'table' => [
                'created'              => 'Created',
                'id'                   => 'ID',
                'last_updated'         => 'Last Updated',
                'deleted_at'           => 'Deleted',
                'created_at'           => 'Created',
                'name'                 => 'Name',
                'status'               => 'Status',
                'location'             => 'Location',
                'type'                 => 'Type',
                'opportunity_start_at' => 'Organization Starts',
                'application_deadline_at' => 'Apply By',
                'no_archived'          => 'No Archived Organizations',
                'no_deleted'           => 'No Deleted Organizations',
                'no_import_review'     => 'No Organizations Need Cleanup Review',
                'no_reviews'           => 'No Submission Reviews Needed',
                'total'                => 'project total|projects total',
            ],

            'tabs' => [
                'titles' => [
                    'overview' => 'Overview',
                    'details' => 'Organization Details',
                    'people' => 'Related Users',
                    'attachments' => 'Uploaded Attachments',
                    'notes' => 'Notes',
                    'history'  => 'History',
                ],

                'content' => [
                    'overview' => [
                        'name'                        => 'Name',
                        'description'                 => 'Description',
                        'status'                      => 'Status',
                        'categories'                  => 'Categories',
                        'keywords'                    => 'Keywords',
                        'location'                    => 'Location',
                        'location_city'               => 'City',
                        'location_state'              => 'State',
                        'location_country'            => 'Country',
                        'location_note'               => 'Note',
                        'created_at'                  => 'Created At',
                        'deleted_at'                  => 'Deleted At',
                        'last_updated'                => 'Last Updated',
                    ],
                    'attachments' => [

                    ],
                    'notes' => [

                    ],
                    'history' => [

                    ],
                ],
            ],

            'view' => 'View Organization',
        ],

        'report' => [
            'projects' => [
                'report'  => 'Projects Report',
                'active_users'  => 'Active Project Users',
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
                'avatar'             => 'Profile Picture',
                'created_at'         => 'Created At',
                'edit_information'   => 'Edit Information',
                'email'              => 'E-mail',
                'last_updated'       => 'Last Updated',
                'name'               => 'Name',
                'first_name'         => 'First Name',
                'last_name'          => 'Last Name',
                'update_information' => 'Update Information',

                'student' => [
                    'student_degree_level' => 'Degree Level',
                    'degree_program'       => 'Degree Program',
                    'graduation_date'      => 'Graduation Date',
                    'phone'                => 'Phone',
                    'research_interests'   => 'Research Interest',
                ],

                'staff' => [
                    'department' => 'Department',
                    'phone'      => 'Phone',
                ],

                'faculty' => [
                    'department'        => 'Department',
                    'phone'              => 'Phone',
                    'research_interests' => 'Research Interests',
                ],

                'professional' => [
                    'organization' => 'Organization',
                    'phone'        => 'Phone',
                ],

            ],
        ],

        'opportunity' => [
            'projects' => [
                'active'              => 'Active Projects',
                'create'              => 'Create Project',
                'deactivated'         => 'Deactivated Projects',
                'deleted'             => 'Deleted Projects',
                'edit'                => 'Edit Project',
                'proposal'            => 'Project Proposal',
                'submit_opportunity'  => 'Submit',
                'accept_application'  => 'Accept Applications?',
                'project_details'     => 'Project Details',
                'locations'           => 'Locations',
                'applicant_details'   => 'Applicant Details',
                'application_process' => 'Application Process',

                'table' => [
                    'created'              => 'Created',
                    'id'                   => 'ID',
                    'last_updated'         => 'Last Updated',
                    'name'                 => 'Name',
                    'status'               => 'Status',
                    'location'             => 'Location',
                    'opportunity_start_at' => 'Project Starts',
                    'application_deadline_at' => 'Apply By',
                    'no_deactivated'       => 'No Deactivated Projects',
                    'no_deleted'           => 'No Deleted Projects',
                    'total'                => 'project total|projects total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'details' => 'Project Details',
                        'people' => 'Related Users',
                        'attachments' => 'Uploaded Attachments',
                        'notes' => 'Notes',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'name'                        => 'Name',
                            'public_name'                 => 'Public Name',
                            'description'                 => 'Description',
                            'status'                      => 'Status',
                            'review_status'               => 'Review Status',
                            'opportunity_start_at'                  => 'Project Starts',
                            'opportunity_end_at'                    => 'Project Ends',
                            'listing_start_at'              => 'Listing Starts',
                            'listing_end_at'                => 'Listing Ends',
                            'application_deadline_at'        => 'Application Deadline',
                            'affiliations'                => 'Affiliations',
                            'categories'                  => 'Categories',
                            'keywords'                    => 'Keywords',
                            'location'                    => 'Location',
                            'location_city'               => 'City',
                            'location_state'              => 'State',
                            'location_country'            => 'Country',
                            'location_note'               => 'Note',
                            'created_at'                  => 'Created At',
                            'deleted_at'                  => 'Deleted At',
                            'last_updated'                => 'Last Updated',
                        ],
                        'details' => [
                            'implementation_paths'        => 'Envisioned Solution',
                            'sustainability_contribution' => 'Sustainability Contribution',
                            'qualifications'              => 'Qualifications',
                            'responsibilities'            => 'Responsibilities',
                            'learning_outcomes'           => 'Learning Outcomes',
                            'compensation'                => 'Compensation',
                            'budget_type'                 => 'Budget Type',
                            'budget_amount'               => 'Budget Amount',
                            'application_instructions'    => 'Application Instructions',
                            'success_story'               => 'Success Story',
                            'library_collection'          => 'Library Collection',
                            'parent_opportunity'          => 'Parent Opportunity',

                        ],
                        'people' => [
                            'organization'    => 'Partner Organization',
                            'supervisor_user' => 'Project Supervisor',
                            'submitting_user' => 'Submitting User',
                            'program_lead'    => 'ASU Program Lead',
                            'members'         => 'Project Members',
                            'followers'       => 'Followers',
                        ],
                        'attachments' => [

                        ],
                        'notes' => [

                        ],
                        'history' => [

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
                    'opportunity_start_at' => 'Internship Starts',
                    'application_deadline_at' => 'Apply By',
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
                            'opportunity_start_at'      => 'Internship Starts',
                            'opportunity_end_at'        => 'Internship Ends',
                            'listing_start_at'            => 'Listing Starts',
                            'listing_end_at'              => 'Listing Ends',
                            'application_deadline_at'   => 'Application Deadline Date',
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
];
