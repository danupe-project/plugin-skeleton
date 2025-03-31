<?php
$prefix = danupe()->plugin('user', 'admin')->getPrefix();

return [
    'navigation' => [
        '/' . $prefix . '/skeletons' => ['title' => 'Skeleton', 'icon' => 'fa-solid fa-x-ray', 'sort' => 100, 'parent' => ''],
        '/' . $prefix . '/skeletons/create' => ['title' => 'Create Skeleton', 'icon' => 'fa-solid fa-x-ray', 'sort' => 101, 'parent' => '/' . $prefix . '/skeletons'],
    ],

    'routes' => [
        ################# skeleton start #################
        '/' . $prefix . '/skeletons' => [
            'controller' => 'Danupe\Plugin\Skeleton\Controllers\SkeletonController',
            'action' => 'index',
            'middlewares' => ['auth'],
            'method' => 'GET',
            'roles' => ['user', 'admin'],
        ],
        '/' . $prefix . '/skeletons/create' => [
            'controller' => 'Danupe\Plugin\Skeleton\Controllers\SkeletonController',
            'action' => 'create',
            'middlewares' => ['auth'],
            'method' => 'GET',
            'roles' => ['user', 'admin'],
        ],
        '/' . $prefix . '/skeletons/edit/{id}' => [
            'controller' => 'Danupe\Plugin\Skeleton\Controllers\SkeletonController',
            'action' => 'edit',
            'middlewares' => ['auth'],
            'method' => 'GET',
            'roles' => ['user', 'admin'],
        ],
        '/' . $prefix . '/skeletons/create_post' => [
            'controller' => 'Danupe\Plugin\Skeleton\Controllers\SkeletonController',
            'action' => 'create_post',
            'middlewares' => ['auth'],
            'method' => 'POST',
            'roles' => ['user', 'admin'],
        ],
        '/' . $prefix . '/skeletons/update_post' => [
            'controller' => 'Danupe\Plugin\Skeleton\Controllers\SkeletonController',
            'action' => 'update_post',
            'middlewares' => ['auth'],
            'method' => 'POST',
            'roles' => ['user', 'admin'],
        ],
        '/' . $prefix . '/skeletons/delete_post' => [
            'controller' => 'Danupe\Plugin\Skeleton\Controllers\SkeletonController',
            'action' => 'delete_post',
            'middlewares' => ['auth'],
            'method' => 'POST',
            'roles' => ['user', 'admin'],
        ],
        ################# skeleton end #################
    ]
];
