<?php
$page = "articleShow";
$user = new User;
$allUsers = $user->get_all_users();
require 'views/index.php';