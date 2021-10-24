<?php

return [
    'main-menu' => [
        [
            'route' => 'dashboard',
            'label' => 'Dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'authorize' => true
        ]
    ],
    'sidebar' => [
        [
            'route' => 'dashboard',
            'label' => 'Dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'authorize' => true
        ],
        ['SEPARATOR'],
        [
            'route' => 'account.index',
            'label' => 'Account',
            'icon' => 'fas fa-user',
            'authorize' => true
        ],
        [
            'route' => 'password.edit',
            'label' => 'Password',
            'icon' => 'fas fa-lock',
            'authorize' => true
        ]
    ]
];
