<?php

require_once 'src/ArticleRepository.php';
require_once 'src/Models/Article.php';
require_once 'helpers/helpers.php';

$articleRepository = new ArticleRepository('articles.json');

// This is the page to update an article.
// We should get the article by ID to pre-populate the edit form.

$article = $articleRepository->getArticleById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="text" name="title" value="<?= $article->getTitle() ?>">
    <!-- <\? php echo-->
</body>
</html>