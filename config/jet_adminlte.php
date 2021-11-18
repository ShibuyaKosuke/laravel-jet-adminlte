<?php

/**
 * Config AdminLTE for Laravel JetStream
 */

return [
    /*
     * Version number on footer (escaped)
     */
    'version' => '3.1.0',

    'feature' => [
        'terms_and_privacy' => true,
        'breadcrumbs' => true,
        'oauth-login' => true,
        'two-factor' => false, // Unimplemented
    ],

    /*
     * Layout settings
     */
    'layout' => [
        /*
         * Enable Dark mode
         */
        'dark-mode' => true,

        /*
         * Fixed Sidebar: use the class .layout-fixed to get a fixed sidebar.
         * Fixed Navbar: use the class .layout-navbar-fixed to get a fixed navbar.
         * Fixed Footer: use the class .layout-footer-fixed to get a fixed footer.
         * Collapsed Sidebar: use the class .sidebar-collapse to have a collapsed sidebar upon loading.
         * Boxed Layout: use the class .layout-boxed to get a boxed layout that stretches only to 1250px.
         * Top Navigation: use the class .layout-top-nav to remove the sidebar and have your links at the top navbar.
         */
        'style' => [
            'layout-fixed'
        ],

        /*
         * Background Color
         */
        'background-color' => [
            'navbar' => 'navbar-dark',
            'sidebar' => 'sidebar-dark-primary',
        ],

        /*
         * Header
         */
        'header' => [
            'fixed' => false,
            'dropdown-legacy-offset' => false,
            'no-border' => false
        ],

        /*
         * Sidebar
         */
        'sidebar' => [
            'collapsed' => false,
            'fixed' => false,
            'sidebar-mini' => true,
            'sidebar-mini-md' => false,
            'sidebar-mini-xs' => false,
            'nav-flat-style' => false,
            'nav-legacy-style' => false,
            'nav-compact' => false,
            'nav-child-indent' => false,
            'nav-child-hide-on-collapse' => false,
            'disable-hover-focus-expand' => false,
        ],

        /*
         * Footer
         */
        'footer' => [
            'fixed' => false,
        ],

        /*
         * Small text
         */
        'small-text' => [
            'body' => false,
            'navbar' => false,
            'brand' => false,
            'sidebar-nav' => false,
            'footer' => false,
        ],

        /*
         * Variable
         */
        'navbar-variants' => null, //
        'accent-color-variants' => null, //
        'dark-sidebar-variants' => null, //
        'light-sidebar-variants' => null, //
        'brand-logo-variants' => null, //
    ],

    'bg-color' => [
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        'info' => 'bg-info',
        'success' => 'bg-success',
        'danger' => 'bg-danger',
        'indigo' => 'bg-indigo',
        'purple' => 'bg-purple',
        'pink' => 'bg-pink',
        'navy' => 'bg-navy',
        'lightblue' => 'bg-lightblue',
        'teal' => 'bg-teal',
        'cyan' => 'bg-cyan',
        'dark' => 'bg-dark',
        'gray-dark' => 'bg-gray-dark',
        'gray' => 'bg-gray',
        'light' => 'bg-light',
        'warning' => 'bg-warning',
        'white' => 'bg-white',
        'orange' => 'bg-orange',
    ],

    'social-service' => [
        'apple' => false,
        'facebook' => false,
        'github' => false,
        'google' => false,
        'instagram' => false,
        'line' => false,
        'microsoft' => false,
        'twitter' => false,
    ]
];
