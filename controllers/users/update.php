<?php
$page = "users";
$user = new User;
$errors = [];
$_SESSION['success_message'] = "";

if (isset($_POST['_method']) && $_POST['_method'] === 'PATCH') {
  $data = [
    $_POST['name'],
    $_POST['email'],
    $_POST['phone'],
    $_POST['user_name'],
    $_POST['user_password'],
    $_POST['group']
  ];

  $user_id = intval($_POST['user_id']);
  $user->update_user($user_id,$data);

  $_SESSION['success_message'] = "User " . $_POST['name'] . " Updated Successfully!!";
}
$allUsers = $user->get_all_users();
require 'views/index.php';
?>
