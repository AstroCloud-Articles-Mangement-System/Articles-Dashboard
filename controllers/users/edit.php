<?php
$page = "user_edit";
$user_id = intval($_GET['id']); 
$userData = new User();
$user = $userData->get_user_by_id($user_id);

$group = new Group();
$allGroups = $group->get_all_groups();
require 'views/index.php';
