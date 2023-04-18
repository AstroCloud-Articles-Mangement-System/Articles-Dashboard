<?php
$router->get('/', 'home/index.php')->only('auth');

//Users
if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin') {

    //Users routes
    $router->get('/users', 'users/index.php');
    $router->get('/users/create', 'users/create.php');
    $router->post('/users', 'users/store.php');
    $router->get('/users/edit', 'users/edit.php');
    $router->put('/users', 'users/update.php');
    $router->delete('/users/delete', 'users/delete.php');

    //Groups
    $router->get('/groups', 'groups/index.php');
    $router->post('/groups', 'groups/index.php');
    $router->get('/groups/create', 'groups/create.php');
    $router->post('/groups', 'groups/store.php');
    $router->get('/groups/edit', 'groups/edit.php');
    $router->put('/groups', 'groups/update.php');
    $router->delete('/groups/delete', 'groups/delete.php');

    //Articles
    $router->get('/articles', 'articles/index.php');
    $router->get('/articles/create', 'articles/create.php');
    $router->delete('/articles/delete', 'articles/delete.php');
    $router->post('/articles', 'articles/store.php');
    $router->get('/articles/show', 'articles/show.php');

    //Profile
    $router->get('/profile', 'profile/index.php');
}

elseif (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'editor') {
    //Articles
    $router->get('/articles', 'articles/index.php');
    $router->get('/articles/create', 'articles/create.php');
    $router->delete('/articles/delete', 'articles/delete.php');
    $router->post('/articles', 'articles/store.php');
    $router->get('/articles/show', 'articles/show.php');

    //Profile
    $router->get('/profile', 'profile/index.php');
}

elseif(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'user'){
    //Profile
    $router->get('/profile', 'profile/index.php');
}




//login 
$router->get('/login', 'login/index.php')->only('guest');
$router->post('/login', 'login/store.php')->only('guest');
$router->get('/logout', 'login/logout.php');