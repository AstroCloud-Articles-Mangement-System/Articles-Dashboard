<?php
$article = new Article;
if (isset($_POST['submit'])) {
    $page = "articles";
    $article_title = $_POST['article_title'];
    $article_summary = $_POST['article_summary'];
    $article_content = $_POST['article_content'];
    $user_id = "1";
    $article_image = $_FILES['article_image']['name'];
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
    $allArticles = $article->get_all_articles();
    $redirect_url = dirname(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php');
    header('Location: ' . $redirect_url);
    exit;
}
