<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Access',

            'roles' => [
                'all'        => 'All Roles',
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',
                'main'       => 'Roles',
            ],

            'users' => [
                'all'             => 'All Users',
                'change-password' => 'Change Password',
                'create'          => 'Create User',
                'deactivated'     => 'Deactivated Users',
                'deleted'         => 'Deleted Users',
                'edit'            => 'Edit User',
                'main'            => 'Users',
                'view'            => 'View User',
            ],
        ],

        'log-viewer' => [
            'main'      => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs'      => 'Logs',
        ],

        'opportunity' => [
            'title' => 'Opportunity',

            'internships' => [
                'all'         => 'All Internships',
                'create'      => 'Create Internship',
                'deactivated' => 'Deactivated Internships',
                'deleted'     => 'Deleted Internships',
                'edit'        => 'Edit Internship',
                'management'  => 'Internship Management',
                'main'        => 'Internships',
                'view'        => 'View Internship',
                'needs_review' => 'Review Internships',
            ],

            'projects' => [
                'all'         => 'All Projects',
                'create'      => 'Create Project',
                'deactivated' => 'Deactivated Projects',
                'deleted'     => 'Deleted Projects',
                'edit'        => 'Edit Project',
                'management'  => 'Project Management',
                'main'        => 'Projects',
                'view'        => 'View Project',
                'needs_review' => 'Review Projects',
            ],
        ],

        'organizations' => [
            'all'         => 'All Organization',
            'create'      => 'Create Organization',
            'deactivated' => 'Deactivated Organizations',
            'deleted'     => 'Deleted Organizations',
            'edit'        => 'Edit Organization',
            'management'  => 'Organization Management',
            'main'        => 'Organizations',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general'   => 'General',
            'history'   => 'History',
            'system'    => 'System',
            'catalog'   => 'Catalog',
        ],
    ],

    'language-picker' => [
        'language' => 'Language',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'Arabic',
            'zh'    => 'Chinese Simplified',
            'zh-TW' => 'Chinese Traditional',
            'da'    => 'Danish',
            'de'    => 'German',
            'el'    => 'Greek',
            'en'    => 'English',
            'es'    => 'Spanish',
            'fa'    => 'Persian',
            'fr'    => 'French',
            'he'    => 'Hebrew',
            'id'    => 'Indonesian',
            'it'    => 'Italian',
            'ja'    => 'Japanese',
            'nl'    => 'Dutch',
            'no'    => 'Norwegian',
            'pt_BR' => 'Brazilian Portuguese',
            'ru'    => 'Russian',
            'sv'    => 'Swedish',
            'th'    => 'Thai',
            'tr'    => 'Turkish',
        ],
    ],
];
