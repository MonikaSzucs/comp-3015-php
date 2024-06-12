<?php
use src\Repositories\ArticleRepository;
require_once 'header.php';
require_once '../src/Repositories/ArticleRepository.php';

$articleRepository = new ArticleRepository();
$articles = $articleRepository->getAllArticles();
$currentArticle = $articleRepository->getArticleById($_POST['update_article_id']);
// print_r("the current article is : " . $currentArticle);
?>

<body>

	<?php require_once 'nav.php'; ?>

	<div class="grid grid-cols-12 mt-20">
		<?php if ($currentArticle): ?>
		<form class="space-y-6 col-start-4 col-span-6" action="/update_article" method="POST">
			<!-- TODO: add form inputs for updating an article -->
			<!-- Note that on page render we should auto-fill the inputs with the correct data based on a query parameter article ID -->
			<!-- takes a string of special characters and converts the string to HTML entities -->
			<input type="hidden" name="id" value="<?= htmlspecialchars($currentArticle->id, ENT_QUOTES) ?>">
			<input type="hidden" name="original_title" value="<?= htmlspecialchars($currentArticle->title, ENT_QUOTES) ?>">
			<p class="text-xl font-bold text-secondary mb-4">Original Title: <?= htmlspecialchars($currentArticle->title, ENT_QUOTES) ?></p>
			<input class="bg-white text-black border-2 p-2" type="text" name="new_title" value="<?= htmlspecialchars($currentArticle->title, ENT_QUOTES) ?>">
			<input class="bg-white text-black border-2 p-2" type="url" name="new_url" value="<?= htmlspecialchars($currentArticle->url, ENT_QUOTES) ?>">
			<button class="btn bg-white hover:bg-priamry" type="submit">Save</button>
		</form>
		<?php else: ?>
			<p class="text-xl font-bold text-secondary mb-4">Article not found.</p>
        <?php endif; ?>
	</div>

</body>