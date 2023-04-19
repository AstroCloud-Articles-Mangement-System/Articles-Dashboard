<?php
require_once('Models/Article.php');
$article = new Article;
$article_id = intval($_GET['id']);
$allUsers = User::get_all_users();

try {
    if ($article->check_id_existence($article_id)) {
        $page = "articleShow";
        $publisher_id = $article->get_article_publisher($article_id);
        $matchingUsers = array_values(array_filter($allUsers, function ($user) use ($publisher_id) {
            return $user['id'] == $publisher_id;
        }));
        $article_data =  $article->get_article_by_id($article_id);
        $publisher_name = $matchingUsers[0]['user_name'];
    } else {
        $page = "articles";
        $allArticles = Article::get_all_articles();
        $_SESSION['error_message'] = "The article does not exist in db";
    }
    require 'views/index.php';
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}
