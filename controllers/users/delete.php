<?php
$user_id = intval($_GET['id']); // cast the id parameter to an integer
die($user_id);
$var = new User();
$user = $var->get_user_by_id($user_id);
require 'views/index.php';

$page="users";
$user = new User();
$allUsers = $user->get_all_users();
require 'views/index.php';
