<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

if (!empty($_POST)) {
    $article = new Article();
    $article->title = $_POST['title'];
    $article->contents = $_POST['contents'];
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $article->save($_POST['id']);
    } else {
        $article->save();
    }
}

header('Location: /admin.php');
exit;