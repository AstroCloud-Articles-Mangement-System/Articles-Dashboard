<?php
require('Models/Article.php');
require('Models/uploadImageInArticle.php');

$_SESSION['error_message'] = "";
$_SESSION['success_message'] = "";
$article = new Article;

try {
    if (isset($_GET['id'])  && $article->check_id_existence(intval($_GET['id']))) {
        $article_id = intval($_GET['id']);
        $sql = "SELECT article_image FROM `articles` WHERE id = $article_id";
        $article_image = Article::get_article_by_any_sql($sql);
        $image_key = $article_image[0]["article_image"];
        try {
            //delete from s3
            $s3 = new uploadImageInArticle($image_key);
            $s3->set_credentials(__KEY__, __SECRET__, __REGION__, __VERSION__);
            $s3->deleteImage($image_key);
            //delete from db
            $article->delete_article($article_id);
            $_SESSION['success_message'] = "";
            $_SESSION['success_message'] = "This Article Deleted Successfully!!";
        } catch (mysqli_sql_exception $exception) {
            $_SESSION['error_message'] = "Error in Deleting this Article.";
            write_to_log_file($exception->getMessage(), $exception->getFile(), $exception->getLine());
        }
    } elseif (isset($_GET['id']) && !$article->check_id_existence($_GET['id'])) {
        $_SESSION['error_message'] = "You can't delete this article. This Article doesn't exist in DB.";
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}
