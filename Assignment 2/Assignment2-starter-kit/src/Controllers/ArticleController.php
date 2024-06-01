<?php

namespace src\Controllers;

use core\Request;
use src\Repositories\ArticleRepository;
use src\Repositories\UserRepository;
use src\Models\Article;
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
	}

	public function store(Request $request)
	{
		// TODO
	}

	/**
	 * Show the form for editing an article.
	 * @param Request $request
	 * @return void
	 */
	public function edit(Request $request): void
	{
		// TODO
	}

	/**
	 * Process the editing of an article.
	 * @param Request $request
	 * @return void
	 */
	public function update(Request $request): void
	{
		// TODO
	}

	/**
	 * Process the deleting of an article.
	 * @param Request $request
	 * @return void
	 */
	public function delete(Request $request): void
	{
		// TODO
	}
}
