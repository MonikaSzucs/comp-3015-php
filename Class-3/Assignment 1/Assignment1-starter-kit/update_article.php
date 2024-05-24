<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'src/ArticleRepository.php';
require_once 'src/Models/Article.php';
require_once 'helpers/helpers.php';

// $articleRepository = new ArticleRepository('articles.json');
// $articles = $articleRepository->getAllArticles();
// // This is the page to update an article.
// // We should get the article by ID to pre-populate the edit form.

// // $article = $articleRepository->getArticleById($_GET['id']);
// $currentArticle = new Article();
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     var_dump($_POST['id']);
//     $id = $_POST['id'];
    
//     // get the data from post
//     foreach ($articles as $article) {
//         if ($article->getId() == $_POST['id']) {
//             $currentArticle = $article;
//             break;
//         }
//     }
// }

$articleRepository = new ArticleRepository('articles.json');
$articles = $articleRepository->getAllArticles();
$currentArticle = new Article();
//$currentArticle = null;

// Get the article by ID for pre-populating the form
if (isset($_GET['id'])) {
    var_dump("GOT THE ID FROM REQUEST");
    $currentArticle = $articleRepository->getArticleById($_GET['id']);
    $currentArticle->setId($_GET['id']);
    if (!$currentArticle) {
        echo "Article not found.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    echo '<pre>';
    print_r("Request method is post with id!");
    print_r($_POST);
    print_r($_POST['id']);
    print_r($_POST['original_title']);
    print_r($_POST['new_title']);
    print_r($_POST['url']);
    print_r($currentArticle);
    echo '</pre>';
    print_r("Ending printing of inputs!");

    if (!$_POST['new_title'] || !$_POST['url']) {
        print_r("One or both the feilds are empty!");
    } else {
        print_r("Both fields have values!");
    }
    
    print_r($currentArticle->getId());
    print_r("just printed the id of current article");
    
    $currentArticle->setId($_POST['id']);
    $currentArticle->setTitle($_POST['new_title']);
    $currentArticle->setUrl($_POST['url']);
    
    echo '<pre>';
    print_r("After setting values:");
    print_r($currentArticle);
    echo '<pre>';
    
    $articleRepository->updateArticle($currentArticle->getId(), $currentArticle);
    // header('Location: /');
    
    // get the data from post
    // foreach ($articles as $article) {
    //     if ($article->getId() == $_POST['id']) {
    //         $currentArticle = $article;
    //         break;
    //     }
    // }

    // if (isset($_POST['id'])) {
    //     $id = $_POST['id'];

    //     // find article to update
    //     $article = $articleRepository->getArticleById($id);
    //     //print_r("TESTESTEST");
    //     //print_r(print_r($_POST['id']));
    //     //print_r("TESTESTEST");
        
    //     if ($article) {
    //         //print_r($article);
    //         //print_r("TEST");
    //         //print_r("1", $article->getTitle());
    //         //print_r("2",$_POST['new_title']);
    //         //print_r($_POST['title']);
    //         // Update the article with the new title and URL
    //         if ($article->getTitle()) {
    //             $article->setTitle($article->getTitle());
    //         }
    //         // if (isset($_POST['url'])) {
    //         //     $article->setUrl($_POST['url']);
    //         // }

    //         // $articleRepository->saveArticle($article);
            
    //         // // Redirect to the homepage or another appropriate page
    //         // header('Location: /');
    //         // exit();
    //     } else {
    //         die("Article not found.");
    //     }
    // } else {
    //     echo "Required data missing. Please fill in all fields.";
    // }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'layout/header.php' ?>

<body>
    <?php if ($currentArticle): ?>
        <form method="POST" action="update_article.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($currentArticle->getId(), ENT_QUOTES) ?>">
            <input type="hidden" name="original_title" value="<?= htmlspecialchars($currentArticle->getTitle(), ENT_QUOTES) ?>">
            <p>Original Title: <?= htmlspecialchars($currentArticle->getTitle(), ENT_QUOTES) ?></p>
            <input type="text" name="new_title" value="<?= htmlspecialchars($currentArticle->getTitle(), ENT_QUOTES) ?>">
            <input type="text" name="url" value="<?= htmlspecialchars($currentArticle->getUrl(), ENT_QUOTES) ?>">
            <button type="submit">Save</button>
        </form>
    <?php else: ?>
        <p>Article not found.</p>
    <?php endif; ?>
    <form method="GET" action="index.php">
        <button type="submit">Cancel</button>
    </form>
</body>
</html>