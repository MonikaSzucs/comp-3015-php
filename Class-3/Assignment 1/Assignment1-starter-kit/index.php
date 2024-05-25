<?php
require_once 'src/ArticleRepository.php';
require_once 'src/Models/Article.php';

$articleRepository = new ArticleRepository('articles.json');
$articles = $articleRepository->getAllArticles();
?>

<!doctype html>
<html lang="en">

<?php require_once 'layout/header.php' ?>

<body class="bg-white">

    <?php require_once 'layout/navigation.php' ?>

    <div class="mx-auto py-8 max-w-5xl sm:px-6 lg:px-8">

        <h2 id="page-title" class="text-5xl text-center text-primary font-semibold text-neutral-content-700 mt-10">Articles</h2>

        <div class="overflow-hidden">
            <ul role="list">

                <?php foreach ($articles as $article) : ?>
                    <!-- display your articles here -->
                    <div class="">
                        <div class="card-body">
                            <h2 class="text-xl font-bold text-secondary mb-4"><?php printf($article->getTitle());?></h2>
                            <a href=<?php printf($article->getUrl());?> target="_blank"><?php printf($article->getUrl());?></a>
                            <div class="card-actions justify-end">
                                <form method="post" action="delete_article.php">
                                    <input name="id" type="hidden" value="<?= $article->getId() ?>">
                                    <input class="btn bg-white hover:bg-priamry" type="submit" value="delete">
                                </form>
                                <!-- GET will help display value (speciially getId) in URL -->
                                <form method="GET" action="update_article.php">
                                    <input name="id" type="hidden" value="<?= $article->getId() ?>">
                                    <input class="btn bg-white hover:bg-priamry" type="submit" value="update">
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php endforeach; ?>

            </ul>
        </div>

    </div>
</body>

</html>