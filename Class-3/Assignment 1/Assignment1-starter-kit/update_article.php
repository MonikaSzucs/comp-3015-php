<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'src/ArticleRepository.php';
require_once 'src/Models/Article.php';
require_once 'helpers/helpers.php';

$articleRepository = new ArticleRepository('articles.json');
$articles = $articleRepository->getAllArticles();
$currentArticle = new Article();

// Get the article by ID for pre-populating the form
if (isset($_GET['id'])) {
    //var_dump("GOT THE ID FROM REQUEST");
    $currentArticle = $articleRepository->getArticleById($_GET['id']);
    $currentArticle->setId($_GET['id']);
    if (!$currentArticle) {
        echo "Article not found.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    if (!$_POST['new_title'] || !$_POST['url']) {
        print_r("One or both the feilds are empty!");
    } else {
        print_r("Both fields have values!");
        $currentArticle->setId($_POST['id']);
        $currentArticle->setTitle($_POST['new_title']);
        $currentArticle->setUrl($_POST['url']);
        
        $articleRepository->updateArticle($currentArticle->getId(), $currentArticle);
    }
    header('Location: /');
}

?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'layout/header.php' ?>

<body class="bg-white p-4">
    <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
    <h2 id="page-title" class="text-5xl text-center text-primary font-semibold text-neutral-content-700 mt-10">Update The Article</h2>
    <div class="card-body">
        <?php if ($currentArticle): ?>
            <form method="POST" action="update_article.php">
                <!-- takes a string of special characters and converts the string to HTML entities -->
                <input type="hidden" name="id" value="<?= htmlspecialchars($currentArticle->getId(), ENT_QUOTES) ?>">
                <input type="hidden" name="original_title" value="<?= htmlspecialchars($currentArticle->getTitle(), ENT_QUOTES) ?>">
                <p class="text-xl font-bold text-secondary mb-4">Original Title: <?= htmlspecialchars($currentArticle->getTitle(), ENT_QUOTES) ?></p>
                <input class="bg-white text-black border-2 p-2" type="text" name="new_title" value="<?= htmlspecialchars($currentArticle->getTitle(), ENT_QUOTES) ?>">
                <input class="bg-white text-black border-2 p-2" type="text" name="url" value="<?= htmlspecialchars($currentArticle->getUrl(), ENT_QUOTES) ?>">
                <button class="btn bg-white hover:bg-priamry" type="submit">Save</button>
            </form>
        <?php else: ?>
            <p class="text-xl font-bold text-secondary mb-4">Article not found.</p>
        <?php endif; ?>
        <form method="GET" action="index.php">
            <button class="btn bg-white hover:bg-priamry" type="submit">Cancel</button>
        </form>
    </div>
</body>
</html>