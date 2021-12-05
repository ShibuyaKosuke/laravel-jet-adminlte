<?php

return [
    'main-menu' => [
        [
            'route' => 'dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'role' => true
        ]
    ],
    'sidebar' => [
        ['SEPARATOR' => 'MAIN MENU'],
        [
            'route' => 'dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'role' => true
        ],
        ['SEPARATOR' => 'ACCOUNT MENU'],
        [
            'route' => 'account.index',
            'icon' => 'fas fa-user',
            'role' => true
        ],
        [
            'route' => 'password.edit',
            'icon' => 'fas fa-lock',
            'role' => true
        ],
        [
            'route' => 'social-accounts',
            'icon' => 'fas fa-link',
            'role' => true
        ],
        [
            'route' => 'two-factor-auth',
            'icon' => 'fas fa-qrcode',
            'role' => true
        ],
        [
            'route' => 'security',
            'icon' => 'fas fa-user-shield',
            'role' => true
        ],
    ]
];
