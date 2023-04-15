<?php
$page = "user_edit";
$user_id = intval($_GET['id']); // cast the id parameter to an integer
$var = new User();
$user = $var->get_user_by_id($user_id);
//var_dump($user);
require 'views/index.php';
