<?php
require_once('Models/Article.php');
$page="articles";
$article=new Article;
$allArticles = $article->get_all_articles();
require 'views/index.php';