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
// if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleRepository = new ArticleRepository('articles.json');
    $articleRepository->deleteArticleById($_POST['id']);
    // $id = $_DELETE('id');
    // var_dump("DELETE CALLED on id ", $id);

    // $articleRepository->deleteArticleById($id);
    // file_put_contents('articles.json', ""); // makes file empty again
    // file_put_contents('articles.json', $articles); // writes new list of articles
    
    // foreach ($articles as $index => $article) {
    //     if ($article->getId() == $id) {
    //         // remove from the array
    //         unset($articles[$index]);
    //         $articles = array_values($articles);
    //         break;
    //     }
    // }
    
    // $articleRepository->
    
} 
// else {
//     var_dump("WHAAT>?? ", $_POST);
// }
?>