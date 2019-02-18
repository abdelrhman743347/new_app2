<?php

return [
    'role_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
            'categories' => 'c,r,u,d', // new model
            'products' => 'c,r,u,d', // new model
        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
