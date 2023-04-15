<?php

use Endroid\QrCode\Color\Color;

$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate name field
    if (empty($_POST["name"])) {
        $errors["name"] = "Name is required";
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $errors["name"] = "Only letters and white space allowed";
        }
    }

    // Validate username field
    if (empty($_POST["user_name"])) {
        $errors["user_name"] = "Username is required";
    } else {
        $username = $_POST["user_name"];
        if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
            $errors["user_name"] = "Only letters, numbers and underscore allowed";
        }
    }

     // Validate email field
    if (empty($_POST["email"])) {
        $errors["email"] = "Email is required";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email format";
        }
    }

     // Validate password field
    if (empty($_POST["password"])) {
        $errors["password"] = "Password is required";
    } else {
        $password = $_POST["password"];

        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
            $errors["password"] = "Password must be at least 8 characters long and contain at least one letter and one number";
        }
    }

    // Validate phone field
    if (empty($_POST["phone"])) {
        $errors["phone"] = "Phone number is required";
    } else {
        $phone = $_POST["phone"];
        if (!preg_match('/^(010|011|012)\d{8}$/', $phone)) {
            $errors["phone"] = "Invalid phone number";
        }
    }

     // Validate group field
    $group = $_POST["group"];
    if (empty($group)) {
        $errors["group"] = "Group selection is required";
    }
}
if (empty($errors)) {
    return true;
} else {
    foreach ($errors as $error) {
        echo "<p class='error'>$error</p>";
    }
}

