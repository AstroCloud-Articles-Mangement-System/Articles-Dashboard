<?php
require_once('Models/Article.php');
$article = new Article;
$article_id = intval($_GET['id']);
$user = new User;
$allUsers = $user->get_all_users();

if ($article->check_id_existence($article_id)) {
    $page = "articleShow";
    $publisher_id = $article->get_article_publisher($article_id);
    $matchingUsers = array_values(array_filter($allUsers, function ($user) use ($publisher_id) {
        return $user['id'] == $publisher_id;
    }));
    $article_data =  $article->get_article_by_id($article_id);
    $publisher_name=$matchingUsers[0]['user_name'];
}else{
    $page = "articles";
    $allArticles = $article->get_all_articles();
    $_SESSION['error_message'] = "The article does not exist in db";
}

require 'views/index.php';