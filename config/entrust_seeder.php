<?php

return [
    'role_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
        ],
    ],
    'user_roles' => [
        'admin' => [
            ['name' => "Admin", "email" => "admin@gmail.com", "password" => '12345678'],
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];