<?php

namespace App\Http\View\Composers;

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
                'name' => __('Users'),
                'link' => '#',
                'icon' => 'fa-user',
                'children' => [
                    [
                        'name' => __('List'),
                        'link' => route('users.index'),
                        'permission' => '',
                    ],
                    [
                        'name' => __('Create'),
                        'link' => route('users.create'),
                        'permission' => '',
                        'include' => [
                            'users.edit',
                        ],
                    ],
                ],
            ],
            [
                'name' => __('Projects'),
                'link' => '#',
                'icon' => 'nav-icon fas fa-chart-pie',
                'children' => [
                    [
                        'name' => __('List'),
                        'link' => route('projects.index'),
                        'permission' => '',
                        'include' => [],
                    ],
                    [
                        'name' => __('Create'),
                        'link' => route('projects.create'),
                        'permission' => '',
                        'include' => [
                            'projects.edit',
                        ],
                    ],
                
                ],
            ],

            [
                'name' => __('Issues'),
                'link' => '#',
                'icon' => 'fa-bug',
                'children' => [
                    [
                        'name' => __('List'),
                        'link' => route('issues.index'),
                        'permission' => '',
                        'include' => [],
                    ],

                    [
                        'name' => __('Create'),
                        'link' => route('issues.create'),
                        'permission' => '',
                        'include' => [
                            'issues.edit',
                        ],
                    ],
                
                ],
            ],

            
        ];
        $view->with(compact('navigations'));
    }
}
