<?php
$user = new User;
$article = new Article;
$page = "profile";
if (isset($_SESSION['user'])) {
    $email = $_SESSION['user']['email'];
    //$sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
    $sql = "SELECT u.*,g.group_name FROM `users` u ,`groups` g WHERE u.group_id=g.id && u.user_email = '$email'";
    $loggedInUser = $user->get_users_by_any_sql($sql)[0];
    $user_group_name= $loggedInUser['group_name'];
    $user_id = intval($loggedInUser['id']);
    $sql = "SELECT * FROM `articles` WHERE `user_id` = $user_id";
    $user_articles = $article->get_article_by_any_sql($sql);
}
require 'views/index.php';
