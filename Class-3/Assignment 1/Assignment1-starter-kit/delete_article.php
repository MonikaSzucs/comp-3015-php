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
    var_dump("INSIDE POST FOR DELETE");

    $articleRepository = new ArticleRepository('articles.json');
    var_dump("value of id: ", $_POST['id']);
    $articleRepository->deleteArticleById($_POST['id']);
    header('Location: http://' . $_SERVER['HTTP_HOST']);
    exit();
} else {
    var_dump($_SERVER);
}
?>