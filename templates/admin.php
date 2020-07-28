<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
    <a href="/">Главная страница</a>

    <h1>Панель администратора</h1>
    <h2>Список новостей</h2>
    <ul>
        <?php
        if ( !empty($this->data['news']) ) {
        foreach ($this->data['news'] as $article) {
        ?>
        <li><span><?php echo $article->title; ?></span> - <a href="/edit_article.php?id=<?php echo $article->id; ?>">редактировать</a><span> | </span><a href="/delete_article.php?id=<?php echo $article->id; ?>">удалить</a></li>
         <?php
            }
        } else {
            echo 'Статей нет. Добавьте пожалуйста статьи по ссылке ниже';
        }
        ?>
    </ul>
    <a href="/edit_article.php">Добавить новость</a>



</div>
</body>
</html>