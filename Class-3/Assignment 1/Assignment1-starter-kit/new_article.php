<?php

require_once 'src/ArticleRepository.php';
require_once 'src/Models/Article.php';
require_once 'helpers/helpers.php';
// ... you'll probably need some of the require statements above
?>

<!doctype html>
<html lang="en">
<?php require_once 'layout/header.php' ?>

<body>
	<?php require_once 'layout/navigation.php' ?>
	<div class="flex min-h-full items-center justify-center px-4 mt-16 sm:px-6 lg:px-8">
		<div class="w-full max-w-xl space-y-8">
			The new article page. Handle displaying the new article form and handling article submissions here.

			<form
				action="new_article.php"
				method="POST">
				<div class="pt-5">
					<span class="error"><?= isset($_GET['title_error']) ? htmlspecialchars($_GET['title_error']) : '' ?></span>
					<div class="text-xl font-bold">
						<label for="title">Title</label>
					</div>
					<div>
						<input id="title" type="text" name="title" placeholder="Title" class="p-2">
					</div>
				</div>
				<div class="pt-5">
					<span class="error"><?= isset($_GET['link_error']) ? htmlspecialchars($_GET['link_error']) : '' ?></span>
					<div class="text-xl font-bold">
						<label for="link">Link</label>
					</div>
					<div>
						<input id="link" type="text" name="link" placeholder="Link" class="p-2">
					</div>
				</div>
				<div class="mt-2">
					<button type="submit" class="group relative flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
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
		var_dump("inside if statement for file path");

		$articleRepository = new ArticleRepository('articles.json');
		
		// add new books
		$articleNew = new Article($id, $title, $link);
		printf("hi", $articleNew);
		$articleRepository->saveArticle($articleNew);

	} else  {
		$currentData = [];
	};
	var_dump("Hello");
	//$currentData[] = $this.

	// header("Location: index.php?from=new_article&msg=thankyou");
	$id++;
	exit();
} else {
	var_dump($_SERVER);
}

?>