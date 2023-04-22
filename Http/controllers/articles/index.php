<?php
require_once('Models/Article.php');
$page = "articles";
try {
    $allArticles = Article::get_all_articles();
    require 'views/index.php';
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}
