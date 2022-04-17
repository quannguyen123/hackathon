<?php

namespace App\Http\View\Composers;

use App\Models\User;
use Illuminate\View\View;

class NavigationComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view): void
    {
        $navigations = [
            [
                'name' => __('message.users'),
                'link' => '#',
                'icon' => 'fa-user',
                'children' => [
                    [
                        'name' => __('List'),
                        'link' => route('users.index'),
                        'permission' => [User::SUPER_ADMIN],
                    ],
                    [
                        'name' => __('Create'),
                        'link' => route('users.create'),
                        'permission' => [User::SUPER_ADMIN],
                        'include' => [
                            'users.edit',
                        ],
                    ],
                ],
            ],
            [
                'name' => __('message.projects'),
                'link' => '#',
                'icon' => 'nav-icon fas fa-chart-pie',
                'children' => [
                    [
                        'name' => __('List'),
                        'link' => route('projects.index'),
                        'permission' => [User::SUPER_ADMIN],
                        'include' => [],
                    ],
                    [
                        'name' => __('Create'),
                        'link' => route('projects.create'),
                        'permission' => [User::SUPER_ADMIN],
                        'include' => [
                            'projects.edit',
                        ],
                    ],

                ],
            ],

            [
                'name' => __('message.issues'),
                'link' => '#',
                'icon' => 'fa-bug',
                'children' => [
                    [
                        'name' => __('List'),
                        'link' => route('issues.index'),
                        'permission' => [User::PROJECT_MANAGER, User::DEVELOPER, User::TESTER],
                        'include' => [],
                    ],

                    [
                        'name' => __('Create'),
                        'link' => route('issues.create'),
                        'permission' => [User::PROJECT_MANAGER, User::DEVELOPER, User::TESTER],
                        'include' => [
                            'issues.edit',
                        ],
                    ],

                ],
            ],

            [
                'name' => __('Guides'),
                'link' => '#',
                'icon' => 'fa-solid fa-briefcase',
                'children' => [
                    [
                        'name' => __('List'),
                        'link' => route('guides.index'),
                        'permission' => [User::PROJECT_MANAGER],
                        'include' => [],
                    ],

                    [
                        'name' => __('Create'),
                        'link' => route('guides.create'),
                        'permission' => [User::PROJECT_MANAGER],
                        'include' => [
                            'guides.edit',
                        ],
                    ],

                ],
            ],


        ];
        $view->with(compact('navigations'));
    }
}
