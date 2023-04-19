<?php
$userData = new User();
$user_id = intval($_GET['id']);
if ($userData->check_id_existence($user_id)) {
    $page = "user_edit";
    $editedUser = $userData->get_user_by_id($user_id);
    $group = new Group();
    $allGroups = $group->get_all_groups();
    require 'views/index.php';
} else {
    $page = "users";
    $_SESSION['error_message'] = "You can't edit user does not exist in db";
    header("location:/users");
}

