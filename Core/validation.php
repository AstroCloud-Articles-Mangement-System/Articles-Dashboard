<?php

use Endroid\QrCode\Color\Color;

$errors = [];
function validate_user()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validate name field
        if (empty($_POST["name"])) {
            $errors["name"] = "Name is required";
        } else {
            $name = $_POST["name"];
            if (!preg_match("/^[a-zA-z\s]{5,20}$/i", $name)) {
                $errors["name"] = "Only letters and white space allowed";
            }
        }

        // Validate username field
        if (empty($_POST["user_name"])) {
            $errors["user_name"] = "Username is required";
        } else {
            $username = $_POST["user_name"];
            if (!preg_match("/^[a-zA-z\s\d_-]{5,20}$/i", $username)) {
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
        if (empty($_POST["user_password"])) {
            $errors["user_password"] = "Password is required";
        } else {
            $password = $_POST["user_password"];
            if (!preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[@!#%&_])[\w@!#%&]{8,}$/", $password)) {
                $errors["user_password"] = "Password must be at least 8 characters long and contain at least one letter and one number";
            }
        }

        // Validate phone field
        if (empty($_POST["phone"])) {
            $errors["phone"] = "Phone number is required";
        } else {
            $phone = $_POST["phone"];
            if (!preg_match('/^(010|011|012|015)\d{8}$/', $phone)) {
                $errors["phone"] = "Invalid phone number";
            }
        }

        // Validate group field
        $group = $_POST["group"];
        if (empty($group)) {
            $errors["group"] = "Group selection is required";
        }
    }

    return $errors ?? "";
}
function validate_group()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validate name field
        if (empty($_POST["group_name"])) {
            $errors["group_name"] = "Group Name is required";
        } else {
            $name = $_POST["group_name"];
            if (!preg_match("/^[a-zA-z\s_-]{5,20}$/i", $name)) {
                $errors["group_name"] = "Only letters,-,_ and white space allowed";
            }
        }
        // Validate description field
        if (empty($_POST["group_desc"])) {
            $errors["group_desc"] = "Group Description is required";
        } else {
            $groupDesc = $_POST["group_desc"];
            if (!preg_match('/^[A-Za-z0-9\-_.,!?;:()\[\]\'"\s]{1,1500}$/i', $groupDesc)) {
                $errors["group_desc"] = "Only letters, numbers and -_.,!?;:()[]\'\" allowed and must be less than 1500 letter";
            }
        }
    }
    return $errors ?? "";
}


function validate_article()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validate article title field
        if (empty($_POST["article_title"])) {
            $errors["article_title"] = "Article Title is required";
        } else {
            $name = $_POST["article_title"];
            if (!preg_match("/^[a-zA-Z]{3,20}$/", $name)) {
                $errors["article_title"] = "Only letters and at most 20 letters allowed";
            }
        }
        // Validate article summary
        if (empty($_POST["article_summary"])) {
            $errors["article_summary"] = "Article Summary is required";
        } else {
            $artSummary = $_POST["article_summary"];
            if (!preg_match('/^[a-zA-Z]{3,20}$/', $artSummary)) {
                $errors["article_summary"] = "Only letters and at most 20 letters allowed";
            }
        }
        // Validate article content
        if (empty($_POST["article_content"])) {
            $errors["article_content"] = "Article Content is required";
        } else {
            $artContent = $_POST["article_content"];
            if (!preg_match('/^[a-zA-Z]{3,20}$/', $artContent)) {
                $errors["article_content"] = "Only letters and at most 20 letters allowed";
            }
        }
        // Check if file has been uploaded
        // if (!empty($_FILES)) {
        //     // Check file size
        //     if ($_FILES["article_image"]["size"] > 3000000) {
        //         $errors["article_image"] = "File Size is too large please upload another file";
        //     }

        //     // Check file type
        //     if (!strstr($_FILES["article_image"]["type"], "image")) {
        //         $errors["article_image"] = "please enter file with image extension like .png .jpg .jpeg";
        //     }
        // } else {
        //     $errors["article_image"] = "Image file is required";
        // }
    }
    return $errors ?? "";
}