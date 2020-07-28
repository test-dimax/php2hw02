<?php

use App\Models\Article;
use \App\View\View;

require __DIR__ . '/autoload.php';

$news = Article::findAll();

$view = new View();
$view
    ->assign(['news' => $news])
    ->display(__DIR__ . '/Templates/admin.php');


