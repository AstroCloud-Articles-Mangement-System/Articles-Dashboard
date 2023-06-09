<?php
require('Core/validation.php');

use Core\Session;

$group = new Group();
$errors;

try {
    if (isset($_POST['submit'])) {
        $errors = validate_group();
        if ($errors == "") {
            $page = "groups";
            $name = $_POST['group_name'];
            $desc = $_POST['group_desc'];
            $data = [
                $name,
                $desc,
            ];
            $group->create_group($data);
            Session::flash('success_message',   "Group " . $name . " Created Successfully!!");
            $allGroups = Group::get_all_groups();
        } else {
            $page = "groupcreate";
            Session::flash('error_message', $errors);
        }
        $redirect_url = dirname(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php');
        header('Location: ' . $redirect_url);
        exit;
    }
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}
