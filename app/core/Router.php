<?php
class Router
{
    public static $paths = [
        "GET" => [
            '/' => 'Home@index',
            '/login' => 'Auth@showLogin',
            '/dashboard/admin' => 'Admin@dashboardAdmin',
            '/dashboard/santri' => 'User@dashboardSantri',
        ],
        "POST" => [
            '/register' => 'Auth@register',
            '/login' => 'Auth@login',
            '/logout' => 'Auth@logout',
        ]
    ];
}
