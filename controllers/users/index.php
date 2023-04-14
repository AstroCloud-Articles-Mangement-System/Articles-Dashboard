<?php
$page="users";
$user = new User();
$var = $user->get_users();
require 'views/index.php';


