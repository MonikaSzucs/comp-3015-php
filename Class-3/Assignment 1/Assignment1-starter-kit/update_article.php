<?php

require_once 'src/ArticleRepository.php';
require_once 'src/Models/Article.php';
require_once 'helpers/helpers.php';

$articleRepository = new ArticleRepository('articles.json');
$articles = $articleRepository->getAllArticles();
// This is the page to update an article.
// We should get the article by ID to pre-populate the edit form.

// $article = $articleRepository->getArticleById($_GET['id']);
$currentArticle = new Article();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    
    // get the data from post
    foreach ($articles as $article) {
        if ($article->getId() == $_POST['id']) {
            $currentArticle = $article;
            break;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'layout/header.php' ?>

<body>
    <form method="PUT" action="update_article.php">
        <input type="text" name="title" value="<?= $currentArticle->getTitle() ?>">
        <input type="text" name="url" value="<?= $currentArticle->getUrl() ?>">
        <button type="submit">Save</button>
    </form>
    <form method="GET" action="update_article.php">
        <input type="button" name="cancel">
    </form>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    var_dump("CANCEL WAS CALLED");

    if ($_GET['title'] !== '') {
        // update the title of this article, get id from $id
    }
    if ($_GET['url'] !== '') {
        // update the url of this article, get id from $id
    } 

    // save all articles back to the file.
    
    // redirect
    header('Location: http://' . $_SERVER['HTTP_HOST']);
    exit();
} else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    var_dump($_PUT['title']);
    var_dump($_PUT['url']);
}
?>