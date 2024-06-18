<?php

namespace src\Repositories;

use src\Models\Article as Article;
use src\Models\User;

class ArticleRepository extends Repository {

	/**
	 * @return Article[]
	 */
	public function getAllArticles(): array {
		// TODO
		// get stuff from database
		$sqlStatement = $this->pdo->query("SELECT * FROM articles");
		$rows = $sqlStatement->fetchAll();

		$articles = [];
		foreach ($rows as $article) {
			$articles[] = new Article($article);
		}
		return $articles;
	}

	/**
 * @param string $title
	 * @param string $url
	 * @param string $authorId
	 * @return Article|false
	 */
	public function saveArticle(string $title, string $url, string $authorId): Article|false {
		// TODO
		if ($title == null || $title == '' || $url == null || $url == '') {
			return false;
		}

		$sqlStatement = $this->pdo->prepare("INSERT INTO articles (title, url, created_at, updated_at, author_id)
											VALUES (?, ?, ?, ?, ?)");
		$created_at = date('Y-m-d H:i:s');
		$updated_at = $created_at; // updated at time is same as the creation time
		$result = $sqlStatement->execute([$title, $url, $created_at, $updated_at, $authorId]);

		if ($result) {
			return new Article([
				'id' => $this->pdo->lastInsertId(),
				'title' => $title,
				'url' => $url, 
				'author_id' => $authorId
			]);
		} else {
			return false;
		}
	}

	/**
	 * @param int $id
	 * @return Article|false Article object if it was found, false otherwise
	 */
	public function getArticleById(int $id): Article|false {
		// TODO		
		$sqlStatement = $this->pdo->query("SELECT * FROM articles");
		$rows = $sqlStatement->fetchAll(); // fetches all rows of query in a tuple
		
		$articles = [];
		foreach ($rows as $article) {
			$current_article = new Article($article);

			if ($current_article->id == $id) {
				return $current_article;
			}
		}
		return false;
	}

	/**
	 * @param int $id
	 * @param string $title
	 * @param string $url
	 * @return bool true on success, false otherwise
	 */
	public function updateArticle(int $id, string $title, string $url): bool {
		// TODO
		$sqlStatement = $this->pdo->prepare("SELECT * FROM articles WHERE id=?");
		$result = $sqlStatement->execute([$id]);
		
		if ($result) {
			$updated_at = date('Y-m-d H:i:s');
			$sqlStatement = $this->pdo->prepare("UPDATE articles SET title=?, url=? WHERE id=?");
			$result = $sqlStatement->execute([$title, $url, $id]);
		}
		return $result;
	}

	/**
	 * @param int $id
	 * @return bool true on success, false otherwise
	 */
	public function deleteArticleById(int $id): bool {
		// TODO
		$sqlStatement = $this->pdo->prepare("SELECT * FROM articles WHERE id=?");
		$result = $sqlStatement->execute([$id]);
		if ($result) {
			$sqlStatement = $this->pdo->prepare("DELETE FROM articles WHERE id=?");
			$result = $sqlStatement->execute([$id]);
		}
		
		return $result;
	}

	/**
	 * @param string $articleId
	 * @return User|false
	 */
	public function getArticleAuthor(string $articleId): User|false {
		// TODO
		// Check if article exists in the db
		$sqlStatement = $this->pdo->query("SELECT * FROM articles WHERE id=$articleId");
		$rows = $sqlStatement->fetch();
		
		if ($rows !== false) {
			$articles = new Article($rows);

			// get user info
			$sqlStatement = $this->pdo->query("SELECT * FROM users WHERE author_id=$articles->author_id");
			$rows = $sqlStatement->fetch();

			return ($rows !== false) ? new User($rows) : false;
		}

		return false;
	}

}
