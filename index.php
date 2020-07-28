<?php

use App\Models\Article;
use App\View\View;

require __DIR__ . '/autoload.php';

//берем последние 3 записи из базы данных
$news = Article::findAll();

$view = new View();
$view
    ->assign(['news' => $news])
    ->display(__DIR__ . '/templates/news.php');