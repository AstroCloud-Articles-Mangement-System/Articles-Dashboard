<?php
require_once('Models/Group.php');

$page = "userscreate";
$group = new Group;
$allGroups = $group->get_all_groups();
require 'views/index.php';
