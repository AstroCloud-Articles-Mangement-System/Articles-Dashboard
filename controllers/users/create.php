<?php
$page = "user_create";
$group = new Group;
$allGroups = $group->get_all_groups();
require 'views/index.php';