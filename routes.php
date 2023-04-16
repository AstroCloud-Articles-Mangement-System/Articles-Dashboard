<?php
$router->get('/', 'home/index.php');
$router->get('/login', 'login/index.php');

//Users
$router->get('/users', 'users/index.php');
$router->get('/users/create', 'users/create.php');
$router->post('/users', 'users/store.php');
$router->get('/users/edit', 'users/edit.php');
$router->put('/users', 'users/update.php');
$router->delete('/users/delete', 'users/delete.php');

//Groups
$router->get('/groups', 'groups/index.php');
$router->get('/groups/edit', 'groups/edit.php');
$router->put('/groups', 'groups/update.php');



//Articles
$router->get('/articles', 'articles/index.php');
$router->get('/articles/create', 'articles/create.php');

//Profile
$router->get('/profile', 'profile/index.php');