<?php
$page = "profile";
try {
    if (isset($_SESSION['user'])) {
        $email = $_SESSION['user']['email'];
        $sql = "SELECT u.*,g.group_name FROM `users` u ,`groups` g WHERE u.group_id=g.id && u.user_email = '$email'";
        $loggedInUser = User::get_users_by_any_sql($sql)[0];
        $user_group_name = $loggedInUser['group_name'];
        $user_id = intval($loggedInUser['id']);
        $sql = "SELECT * FROM `articles` WHERE `user_id` = $user_id";
        $user_articles = Article::get_article_by_any_sql($sql);
    }
    require 'views/index.php';
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}
