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
                'icon' => 'fa-users',
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
                'icon' => 'fa-filter',
                'children' => [
                    [
                        'name' => __('List'),
                        'link' => route('project-index'),
                        'permission' => '',
                        'include' => [],
                    ],
                    [
                        'name' => __('Create'),
                        'link' => route('project-add'),
                        'permission' => '',
                        'include' => [
                            'users.edit',
                        ],
                    ],
                
                ],
            ],

            [
                'name' => __('Issues'),
                'link' => '#',
                'icon' => 'fa-filter',
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
                            'users.edit',
                        ],
                    ],
                
                ],
            ],

            
        ];
        $view->with(compact('navigations'));
    }
}
