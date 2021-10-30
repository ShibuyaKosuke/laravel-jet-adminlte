<?php

return [
    'main-menu' => [
        [
            'route' => 'dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'authorize' => true
        ]
    ],
    'sidebar' => [
        ['SEPARATOR' => 'Main menu'],
        [
            'route' => 'dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'authorize' => true
        ],
        ['SEPARATOR' => 'Account menu'],
        [
            'route' => 'account.index',
            'icon' => 'fas fa-user',
            'authorize' => true
        ],
        [
            'route' => 'password.edit',
            'icon' => 'fas fa-lock',
            'authorize' => true
        ]
    ]
];
