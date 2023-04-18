<?php
$user = new User;
$article = new Article;
$page = "profile";
if (isset($_SESSION['user'])) {
    $email = $_SESSION['user']['email'];
    $sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
    $loggedInUser = $user->get_users_by_any_sql($sql)[0];
    $user_id = $loggedInUser['id'];
    $sql = "SELECT * FROM `articles` WHERE `user_id` = $user_id";
    $user_articles = $article->get_articles_by_any_sql($sql);
    var_dump($loggedInUser, '***********', $user_articles);
}
//require 'views/index.php';
