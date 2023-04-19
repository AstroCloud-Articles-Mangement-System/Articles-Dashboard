<?php
$router->get('/', 'home/index.php');


//Users 
$router->get('/users', 'users/index.php')->only('admin');
$router->get('/users/create', 'users/create.php')->only('admin');
$router->post('/users', 'users/store.php')->only('admin');
$router->get('/users/edit', 'users/edit.php')->only('admin');
$router->put('/users', 'users/update.php')->only('admin');
$router->delete('/users/delete', 'users/delete.php')->only('admin');

//Groups
$router->get('/groups', 'groups/index.php')->only('admin');
$router->post('/groups', 'groups/index.php')->only('admin');
$router->get('/groups/create', 'groups/create.php')->only('admin');
$router->post('/groups', 'groups/store.php')->only('admin');
$router->get('/groups/edit', 'groups/edit.php')->only('admin');
$router->put('/groups', 'groups/update.php')->only('admin');
$router->delete('/groups/delete', 'groups/delete.php')->only('admin');

//Articles
$router->get('/articles', 'articles/index.php')->only('admin', 'editor');
$router->get('/articles/create', 'articles/create.php')->only('admin', 'editor');
$router->delete('/articles/delete', 'articles/delete.php')->only('admin', 'editor');
$router->post('/articles', 'articles/store.php')->only('admin', 'editor');
$router->get('/articles/show', 'articles/show.php')->only('admin', 'editor');

//Profile
$router->get('/profile', 'profile/index.php')->only('admin|editor|user');

//login 
$router->get('/login', 'login/index.php')->only('guest');
$router->post('/login', 'login/store.php')->only('guest');
$router->get('/logout', 'login/logout.php');
