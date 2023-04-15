<?php
$router->get('/', 'index.php');
$router->get('/login', 'login/index.php');

$router->get('/users', 'users/index.php');
$router->get('/profile', 'profile/index.php');
$router->get('/groups', 'groups/index.php');
$router->get('/articles', 'articles/index.php');

$router->get('/user/edit', 'users/edit.php');
//$router->patch('/user', 'users/update.php');

