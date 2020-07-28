<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';


if ( isset($_GET['id']) && !empty($_GET['id']) ) {
    //берем статью под соотвествующим id
    $article = Article::findById($_GET['id']);
    if (!empty($article)) {
        include  __DIR__.'/templates/article.php';
    } else {
        echo 'Такой статьи не существует, вернитесь в <a href="/">список новостей</a>';
    }
}

