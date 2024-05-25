<?php

require_once 'src/ArticleRepository.php';
require_once 'src/Models/Article.php';
require_once 'helpers/helpers.php';
// ... you'll probably need some of the require statements above
?>

<!doctype html>
<html lang="en">
<?php require_once 'layout/header.php' ?>

<body class="bg-white">
	<?php require_once 'layout/navigation.php' ?>
	<div class="flex min-h-full items-center justify-center py-8 px-4 mt-16 sm:px-6 lg:px-8">
		<div class="w-full max-w-xl space-y-8">
		<h2 id="page-title" class="text-5xl text-center text-primary font-semibold text-neutral-content-700 mt-10">Add New Article</h2>

			<form
				action="new_article.php"
				method="POST">
				<div class="pt-5">
					<span class="error"><?= isset($_GET['title_error']) ? htmlspecialchars($_GET['title_error']) : '' ?></span>
					<div class="text-xl font-bold">
						<label class="text-xl font-bold text-secondary mb-4" for="title">Title</label>
					</div>
					<div>
						<input id="title" type="text" name="title" placeholder="Title" class="bg-white text-black border-2 p-2">
					</div>
				</div>
				<div class="pt-5">
					<span class="error"><?= isset($_GET['link_error']) ? htmlspecialchars($_GET['link_error']) : '' ?></span>
					<div class="text-xl font-bold">
						<label class="text-xl font-bold text-secondary mb-4" for="link">Link</label>
					</div>
					<div>
						<input id="link" type="text" name="link" placeholder="Link" class="bg-white text-black border-2 p-2">
					</div>
				</div>
				<div class="mt-2">
					<button type="submit" class="btn bg-white hover:bg-priamry">
						Submit
					</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>

<style>
    span.error {
        color: red;
    }
</style>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = time();
	$title = $_POST['title'];
	$link = $_POST['link'];

	if (!validTitle($title)) {
		header("Location: new_article.php?title_error=Invalid Title");
		exit();
	}
	if (!validLink($link)) {
		header("Location: new_article.php?link_error=Invalid link. Link must be properly formatted.");
		exit();
	}

	$filePath = 'articles.json';

	if(file_exists($filePath)) {
		$articleRepository = new ArticleRepository('articles.json');
		
		// add new books
		$articleNew = new Article($title, $link);
		$articleRepository->saveArticle($articleNew);

	} else  {
		$currentData = [];
	};
	$id++;
	exit();
} else {
	//var_dump($_SERVER);
}

?>