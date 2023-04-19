<?php
$router->get('/', 'home/index.php');

//Users 
$router->get('/users', 'users/index.php')->only(['remember','auth','admin']);
$router->get('/users/create', 'users/create.php')->only(['remember','auth','admin']);
$router->post('/users', 'users/store.php')->only(['remember','auth','admin']);
$router->get('/users/edit', 'users/edit.php')->only(['remember','auth','admin']);
$router->put('/users', 'users/update.php')->only(['remember','auth','admin']);
$router->delete('/users/delete', 'users/delete.php')->only(['remember','auth','admin']);
$router->get('/users/restore', 'users/restore.php')->only(['remember','auth','admin']);

//Groups
$router->get('/groups', 'groups/index.php')->only(['remember','auth','admin']);
$router->post('/groups', 'groups/index.php')->only(['remember','auth','admin']);
$router->get('/groups/create', 'groups/create.php')->only(['remember','auth','admin']);
$router->post('/groups', 'groups/store.php')->only(['remember','auth','admin']);
$router->get('/groups/edit', 'groups/edit.php')->only(['remember','auth','admin']);
$router->put('/groups', 'groups/update.php')->only(['remember','auth','admin']);
$router->delete('/groups/delete', 'groups/delete.php')->only(['remember','auth','admin']);
$router->get('/groups/restore', 'groups/restore.php')->only(['remember','auth','admin']);

//Articles
$router->get('/articles', 'articles/index.php')->only(['remember','auth','admin|editor']);
$router->get('/articles/create', 'articles/create.php')->only(['remember','auth','admin|editor']);
$router->delete('/articles/delete', 'articles/delete.php')->only(['remember','auth','admin|editor']);
$router->post('/articles', 'articles/store.php')->only(['remember','auth','admin|editor']);
$router->get('/articles/show', 'articles/show.php')->only(['remember','auth','admin|editor']);

// //Profile
$router->get('/profile', 'profile/index.php')->only(['auth']);

//login 
$router->get('/login', 'login/index.php')->only(['guest']);
$router->post('/login', 'login/store.php')->only(['guest']);
$router->get('/logout', 'login/logout.php');