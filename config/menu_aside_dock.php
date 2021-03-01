<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/home',
            'new-tab' => false,
        ],

        // Manager

        [
            'title' => 'Vehicle Dock IN',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/docksup/docklist',
            'new-tab' => false,
        ],

        // Dock Security
        [
            'title' => 'Vehicle Dock Out',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/docksup/dockoutlist',
            'new-tab' => false,
        ],
        // Main Gate Security

        // CRUD


        // Features

    ]

];
