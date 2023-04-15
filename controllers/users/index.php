<?php
require_once('Models/User.php');
require_once('Models/Group.php');
$page = "users";
$user = new User;
$group = new Group;
$allUsers = $user->get_all_users();
$allGroups = $group->get_all_groups();
require 'views/index.php';