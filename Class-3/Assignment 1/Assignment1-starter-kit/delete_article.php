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

<body>

    <?php require_once 'layout/navigation.php' ?>

    <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">

        <h2 id="page-title" class="text-xl text-center font-semibold text-indigo-700 mt-10">Delete Article</h2>

        <div class="overflow-hidden">
            <ul role="list">

                <?php foreach ($articles as $article) : ?>
                    <!-- display your articles here -->
                    
                <?php endforeach; ?>

            </ul>
        </div>

    </div>


</body>

</html>