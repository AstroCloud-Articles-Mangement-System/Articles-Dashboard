<?php
function validate_form_()
{
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $user_name = isset($_POST["user_name"]) ? $_POST["user_name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $group = isset($_POST["group"]) ? $_POST["group"] : "";
    if (empty($name)) {
        return "Name is required";
    } else if (empty($user_name)) {
        return "user name is required";
    } else if (empty($password)) {
        return "Password is required";
    } else if (empty($phone)) {
        return "Phone is required";
    } else if (empty($group)) {
        return "Group is required";
    } else if (empty($email)) {
        return "Email is required";
    }else if (empty($name) && empty($email)) {
        return "Name and Email are required";
    } else if (empty($name) && empty($email) && empty($user_name) && empty($password) && empty($phone) && empty($group)) {
        return "empty fields";
    } else if (strlen($name) > MAX_NAME_LENGTH) {
        return "Name must be less than 100 characters";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email is invalid";
    } else {
        return "";
    }
}


?>