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
		$sqlStatement = $this->pdo->prepare("INSERT INTO articles (title, url, created_at, updated_at, author_id)
											VALUES (?, ?, ?, NULL, ?)");
		$created_at = date('Y-m-d H:i:s');
		$result = $sqlStatement->execute([$title, $url, $created_at, $authorId]);
		
		return $result;
	}

	/**
	 * @param int $id
	 * @return Article|false Article object if it was found, false otherwise
	 */
	public function getArticleById(int $id): Article|false {
		// TODO
		//$sqlStatement = $this->pdo->prepare("INSERT INTO articles (title, url, created_at, updated_at, author_id) VALUES (?, ?, ?, null, ?)");
		
		$sqlStatement = $this->pdo->query("SELECT * FROM articles");
		$rows = $sqlStatement->fetchAll(); // fetches all rows of query in a tuple
		print_r($rows);
		
		$articles = [];
		foreach ($rows as $article) {
			if($article->$id == $id) {
				$articles[] = new Article($article);
				return true;
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
			// foreach ($rows as $article) {
			// 	$articles[] = new Article($article);
			// }
			// $author_id = $articles[0]->author_id;

			// get user info
			$sqlStatement = $this->pdo->query("SELECT * FROM users WHERE author_id=$articles->author_id");
			$rows = $sqlStatement->fetch();

			return ($rows !== false) ? new User($rows) : false;

			// if (count($rows) == 1) {
			// 	$users = [];
			// 	foreach ($rows as $user) {
			// 		$users[] = $user;
			// 	}
			// 	return $users[0];
			// } else {
			// 	return false;
			// }
		}

		return false;
	}

}
