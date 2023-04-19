<?php
namespace Core;

class RoutesPermissions{
    protected  $allowedRoles = [
        
        '/' => ['admin','editor','user'],

        '/users' => ['admin'],
        '/users/create' => ['admin'],
        '/users/edit' => ['admin'],
        '/users/delete' => ['admin'],

        '/groups' => ['admin'],
        '/groups/create' => ['admin'],
        '/groups/edit' => ['admin'],
        '/groups/delete' => ['admin'],

        '/articles' => ['admin', 'editor'],
        '/articles/create' => ['admin', 'editor'],
        '/articles/show' => ['admin', 'editor'],
        '/articles/delete' => ['admin', 'editor'],

        '/profile' => ['admin', 'editor', 'user'],
        '/login' => ['admin', 'editor', 'user'],
        '/logout' => ['admin', 'editor', 'user'],
    ];
}
