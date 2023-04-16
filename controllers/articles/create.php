<?php
require_once('Models/Article.php');

$page = "articleCreate";
$user = new User;
$allUsers = $user->get_all_users();
require 'views/index.php';