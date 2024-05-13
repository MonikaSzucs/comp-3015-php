<?php

class ArticleRepository
{

	private string $filename;

	public function __construct(string $theFilename)
	{
		$this->filename = $theFilename;
	}

	/**
	 * @return Article[]
	 */
	public function getAllArticles(): array
	{
		if (!file_exists($this->filename)) {
			return [];
		}
		$fileContents = file_get_contents($this->filename);
		if (!$fileContents) {
			return [];
		}
		$decodedArticles = json_decode($fileContents, true);
		if (json_last_error() !== JSON_ERROR_NONE) {
			return [];
		}
		$articles = [];
		foreach ($decodedArticles as $decodedArticle) {
			$articleId = time();
			$articles[] = (new Article($articleId))->fill($decodedArticle);
		}
		return $articles;
	}

	/**
	 *
	 */
	public function getArticleById(int $id): Article|null
	{
		$articles = $this->getAllArticles();
		foreach ($articles as $article) {
			if ($article->getId() === $id) {
				return $article;
			}
		}
		return null;
	}

	/**
	 * @param int $id
	 */
	public function deleteArticleById(int $id): void
	{
		// TODO
		$articles = $this->getAllArticles();

		foreach($articles as $index => $article) {
			if($articles[$index]->getId() === $id) {
				unset($articles[$index]);
				$articles = array_values($articles);
				break;
			}
		}

		// save back to the file
		file_put_contents($this->filename, "");
		file_put_contents($this->filename, json_encode($articles, JSON_PRETTY_PRINT));
	}

	/**
	 * @param Article $article
	 */
	public function saveArticle(Article $article): void
	{
		// TODO
		$articles = $this->getAllArticles();  // $articles is an array of Article
		array_push($articles, $article);

		file_put_contents($this->filename, json_encode($articles, JSON_PRETTY_PRINT));
	}

	/**
	 * @param int $id
	 * @param Article $updatedArticle
	 */
	public function updateArticle(int $id, Article $updatedArticle): void
	{
		// TODO

		$fileContent = file_get_contents('../articles.json');

		$articles = json_decode($fileContent, true);

		foreach($articles as &$article) {
			if($article['id'] === $id) {
				$article['id'] = $updatedArticle->getId();
				$article['title'] = $updatedArticle->getTitle();
				$article['url'] = $updatedArticle->getUrl();
				break;
			}
		}
		unset($article);

		$articles = json_encode($articles, JSON_PRETTY_PRINT);
		file_put_contents('../articles.json', $articles);
	}
}
