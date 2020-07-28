<?php

use App\Models\Article;
use \App\View\View;

require __DIR__ . '/autoload.php';

$view = new View();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $article = Article::findById($_GET['id']);
    $view->assign(['article' => $article]);
}
$news = Article::findAll();

$view->display(__DIR__ . '/Templates/edit_article.php');


