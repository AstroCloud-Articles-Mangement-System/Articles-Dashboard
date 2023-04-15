<?php
$user_id = intval($_GET['id']); // cast the id parameter to an integer
$var = new User();
$user = $var->delete_user($user_id);
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
