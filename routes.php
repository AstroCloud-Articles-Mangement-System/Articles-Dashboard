<?php
$router->get('/', 'home/index.php');
$router->get('/login', 'login/index.php');

//users
$router->get('/users', 'users/index.php');
$router->get('/userscreate', 'users/create.php');
$router->post('/users', 'users/store.php');

$router->get('/profile', 'profile/index.php');
$router->get('/groups', 'groups/index.php');
$router->get('/articles', 'articles/index.php');
