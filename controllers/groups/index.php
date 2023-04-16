<?php
require_once('Models/Group.php');
$page="groups";
$group = new Group;
$allGroups = $group->get_all_groups();
require 'views/index.php';