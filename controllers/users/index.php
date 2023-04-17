<?php
$page = "users";
$user = new User;
$group = new Group;
$allGroups = $group->get_all_groups();
$allUsers = $user->get_all_users_with_groups();
require 'views/index.php';