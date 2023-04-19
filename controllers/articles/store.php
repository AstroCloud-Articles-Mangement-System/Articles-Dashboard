<?php
require "core/validation.php";
$article = new Article;
$user = new User;
$errors = "";
$_SESSION['success_message'] = "";
$_SESSION['error_message'] = "";
if (isset($_POST['submit']) && isset($_SESSION['user'])) {
    $errors = validate_article();
    if ($errors == "") {
        $page = "articles";
        $article_title = $_POST['article_title'];
        $article_summary = $_POST['article_summary'];
        $article_content = $_POST['article_content'];
        $file_name = $_FILES["article_image"]["name"];
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $object_key = uniqid() . "." . $file_extension;
        $email = $_SESSION['user']['email'];
        $sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
        $loggedInUser = $user->get_users_by_any_sql($sql)[0];
        $user_id = intval($loggedInUser['id']);
        $article_image =  $object_key;
        $publishing_date = date("Y-m-d");
        $data = [
            $article_title,
            $article_summary,
            $article_image,
            $article_content,
            $publishing_date,
            $user_id,
        ];
        $article->create_article($data);
        $file = new uploadImageInArticle($object_key);
        $_SESSION['success_message'] = "article Created Successfully!!";
        $allArticles = $article->get_all_articles();
    } else {
        $page = "articleCreate";
        $_SESSION['error_message'] = $errors;
    }
    $redirect_url = dirname(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php');
    header('Location: ' . $redirect_url);
    exit;
}
