<?php
require('Models/Article.php');

$_SESSION['error_message'] = "";
$_SESSION['success_message'] = "";
$article = new Article;
if (isset($_GET['id'])  && $article->check_id_existence(intval($_GET['id']))) {
    $article_id = intval($_GET['id']);
    try {
        $article->delete_article($article_id);
        $_SESSION['success_message'] = "";
        $_SESSION['success_message'] = "This Article Deleted Successfully!!";
    } catch (mysqli_sql_exception $exception) {
        $_SESSION['error_message'] = "Error in Deleting this Article.";
    }
} elseif (isset($_GET['id']) && !$article->check_id_existence($_GET['id'])) {
    $_SESSION['error_message'] = "You can't delete this article. This Article doesn't exist in DB.";
}
header("Location: " . $_SERVER['HTTP_REFERER']);
