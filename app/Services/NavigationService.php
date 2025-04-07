<?php

namespace App\Services;

use Auth;
use Lang;

class NavigationService
{
    public static function generate_menu($active_menu)
    {
        $user = Auth::user();
        $menus = [];
        if($active_menu == '') {
            $active_menu = \Route::currentRouteName();
        }

        $menus[] = [
            'link' => route('dashboard'),
            'text' => "Dashboard",
            'icon' => 'bi bi-speedometer',
            'is_active' => $active_menu == 'dashboard',
            'has_submenu' => false,
            'sub_menu' => [],
        ];

        if($user->hasPermission('*-users|*-roles')) {
            $sub_menu = [];
            
            if($user->hasPermission('*-users')) {
                $sub_menu[] = [
                    'link' => route('users'),
                    'text' => "Users",
                    'is_active' => $active_menu == 'users',
                ];
            }

            if($user->hasPermission('*-roles')) {
                $sub_menu[] = [
                    'link' => route('roles'),
                    'text' => "Roles & Permissions",
                    'is_active' => $active_menu == 'roles_privilege',
                ];
            }

            $menus[] = [
                'link' => 'AdminUserDropdown',
                'text' => "Manage Users",
                'icon' => 'fas fa-user-shield',
                'is_active' => in_array($active_menu,['users', 'roles_privilege']),
                'has_submenu' => true,
                'sub_menu' => $sub_menu,
            ];
        }

        if ($user->hasRole('admin') || $user->can('read-students')) { // Allow admin and users with read-students permission
            $menus[] = [
                'link' => route('students'),
                'text' => "Students",
                'icon' => 'bi bi-people',
                'is_active' => $active_menu == 'students',
                'has_submenu' => false,
                'sub_menu' => [],
            ];
        }
        if ($user->hasRole('admin') || $user->can('read-teacher')) { // Allow admin and users with read-students permission
            $menus[] = [
                'link' => route('teacher'),
                'text' => "Teacher",
                'icon' => 'fas fa-user',
                'is_active' => $active_menu == 'teacher',
                'has_submenu' => false,
                'sub_menu' => [],
            ];
        }

        if ($user->hasRole('admin') || $user->can('read-exams')) {
            $menus[] = [
                'link' => route('exams'),
                'text' => "Exams",
                'icon' => 'bi bi-calendar-event',
                'is_active' => $active_menu == 'exams',
                'has_submenu' => false,
                'sub_menu' => [],
            ];
        }

        $sub_menu = [
            [
                'link' => route('small_box'),
                'text' => "Small Box",
                'is_active' => $active_menu == 'small_box',
            ],
            [
                'link' => route('info_box'),
                'text' => "Info Box",
                'is_active' => $active_menu == 'info_box',
            ],
            [
                'link' => route('card'),
                'text' => "Cards",
                'is_active' => $active_menu == 'card',
            ],
        ];

        // $menus[] = [
        //     'link' => 'WidgetUserDropdown',
        //     'text' => "Widgets",
        //     'icon' => 'bi bi-box-seam-fill',
        //     'is_active' => in_array($active_menu,['small_box', 'info_box','card']),
        //     'has_submenu' => true,
        //     'sub_menu' => $sub_menu,
        // ];

        return $menus;
    }
}