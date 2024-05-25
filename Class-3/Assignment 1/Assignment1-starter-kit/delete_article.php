<?php

// Handle article deletion and redirecting back to the index page
require_once 'src/ArticleRepository.php';
require_once 'src/Models/Article.php';

$articleRepository = new ArticleRepository('articles.json');
$articles = $articleRepository->getAllArticles();
?>

<!doctype html>
<html lang="en">

<?php require_once 'layout/header.php' ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleRepository = new ArticleRepository('articles.json');

    $articleRepository->deleteArticleById($_POST['id']);
    header('Location: http://' . $_SERVER['HTTP_HOST']); // grab url
    exit();
} else {
    var_dump($_SERVER);
}
?>