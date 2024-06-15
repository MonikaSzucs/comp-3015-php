<?php

namespace src\Controllers; // benefit is use 3rd part code that has the same class name
// class name: Client
// third party dependency: might be Client


use core\Request;
use src\Repositories\ArticleRepository;
use src\Repositories\UserRepository;
use src\Models\Article;

//src\Controllers\ArticleController -> FQCN
class ArticleController extends Controller
{

	/**
	 * Display the page showing the articles.
	 * @return void
	 */
	public function index(): void
	{
		// TODO
		$this->render('index', ['articles' => []]);
	}

	/**
	 * Process the storing of a new article.
	 * @return void
	 */
	public function create(): void
	{
		// TODO
		$this->render('new_article', [
			'user' => null
		]);
	}
	public function store(Request $request)
	{
		// TODO
		$article_repository = new ArticleRepository();

		$title = $_POST['title'];
		$link = $_POST['link'];

		$newArticle = $article_repository->saveArticle($title, $link, $_SESSION['user_id']);

		if (!$newArticle) {
			echo "<script type='text/javascript'>alert(Article not setup properly, please try again later.);</script>";
		} else {
			header('Location: /');	
		} 
	}

	/**
	 * Show the form for editing an article.
	 * @param Request $request
	 * @return void
	 */
	public function edit(Request $request): void
	{
		// TODO
		$this->render('update_article', [
			'user' => null
		]);
	}

	/**
	 * Process the editing of an article.
	 * @param Request $request
	 * @return void
	 */
	public function update(Request $request): void
	{
		// TODO
		// update the database here
		$article_repository = new ArticleRepository();
		$article_repository->updateArticle($_POST['id'], $_POST['new_title'], $_POST['new_url']);
		
		// redirect to the main page
		header("Location: /");
	}

	/**
	 * Process the deleting of an article.
	 * @param Request $request
	 * @return void
	 */
	public function delete(Request $request): void
	{
		// TODO
		$article_repository = new ArticleRepository();
		$articleRemoved = $article_repository->deleteArticleById($_POST['delete_article']);

		if (!$articleRemoved) {
			echo "<script type='text/javascript'>alert(Cannot remove article.);</script>";
		} else {
			header("Location: /");
		}
	}
}
