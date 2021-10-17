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
    ],

    /*
     * Layout settings
     */
    'layout' => [

        'style' => null, // layout-boxed,

        /*
         * Enable Dark mode
         */
        'dark-mode' => true,

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
            'fixed' => true,
            'dropdown-legacy-offset' => false,
            'no-border' => false
        ],

        /*
         * Sidebar
         */
        'sidebar' => [
            'collapsed' => false,
            'fixed' => false,
            'sidebar-mini' => false,
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
