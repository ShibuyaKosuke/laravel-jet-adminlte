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
        ['SEPARATOR' => 'MAIN MENU'],
        [
            'route' => 'dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'authorize' => true
        ],
        ['SEPARATOR' => 'ACCOUNT MENU'],
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
