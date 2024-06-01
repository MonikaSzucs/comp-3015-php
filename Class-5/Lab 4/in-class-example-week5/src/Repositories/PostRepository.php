<?php

namespace src\Repositories;

require_once 'Repository.php';
require_once __DIR__ . '/../Models/Post.php';

use src\Models\Post as Post;

class PostRepository extends Repository {

	/**
	 * @return Post[]
	 */
	public function getAllPosts(): array {
		$sqlStatement = $this->pdo->query("SELECT * FROM posts;");
		$rows = $sqlStatement->fetchAll();

		$posts = [];
		foreach ($rows as $row) {
			$posts[] = new Post($row);
		}

		return $posts;
	}

	/**
	 * @param string $title
	 * @param string $body
	 * @return Post|false
	 *
	 * This is horrible! Let's exploit the vulnerability and drop the database.
	 *
	 * Do not do SQL injection attacks on software that you don't own.
	 */
	public function savePost(string $title, string $body): Post|false {
		$createdAt = date('Y-m-d H:i:s');
		// 1. tells us what to execute with database
		// exec or prepare
		// send query itself to database first without variable data
		// prepare will help prevent from SQL injections
		$statement = $this->pdo->prepare("INSERT INTO posts (created_at, updated_at, body, title) VALUES (?, NULL, ?, ?);");
		// this one provides data to fill database in queries
		$success = $statement->execute([$createdAt, $body, $title]);
		// teacher wants this prepare and execute keep it like this.
		if ($success) {
		//if ($rowsChanged === 1) {
			// 2. get the last ID inserted
			$id = $this->pdo->lastInsertId();
			// 3. issue a select query to the DB
			$sqlStatement = $this->pdo->prepare("SELECT * FROM posts where id = :id");
			$sqlStatement->bindParam(":id", $id, $this->pdo::PARAM_INT);
			$sqlStatement->execute();
			$result = $sqlStatement->fetch($this->pdo::FETCH_ASSOC);
			// 4. fetch the result as an associative array, and turn it into an object
			return new Post($result);
		}
		return false;
	}

	/**
	 * @param int $id
	 * @return Post|false Post object if it was found, false otherwise
	 */
	public function getPostById(int $id): Post|false {
		$sqlStatement = $this->pdo->prepare('SELECT * FROM posts WHERE id=?');
		$result = $sqlStatement->execute([$id]);
		if ($result) {
			$resultSet = $sqlStatement->fetch();
			return new Post($resultSet);
		}
		return false;
	}

	/**
	 * @param int $id
	 * @param string $title
	 * @param string $body
	 * @return bool true on success, false otherwise
	 */
	public function updatePost(int $id, string $title, string $body): bool {
		// can do we waht we did in create to grab info 
		$sqlStatement = $this->pdo->prepare('SELECT * FROM posts WHERE id=?');
		$result = $sqlStatement->execute([$id]);
		if ($result) {
			$updated_at = date('Y-m-d H:i:s');
			$sqlStatement = $this->pdo->prepare('UPDATE posts SET title=?, body=?, updated_at=? WHERE id=?');
			$result = $sqlStatement->execute([$title, $body, $updated_at, $id]);
			return $result;
		}
		
		return false;
	}

	/**
	 * @param int $id
	 * @return bool true on success, false otherwise
	 */
	public function deletePostById(int $id): bool {
		// TODO
		$sqlStatement = $this->pdo->prepare('SELECT * FROM posts WHERE id=?');
		$result = $sqlStatement->execute([$id]);
		if ($result) {
			$sqlStatement = $this->pdo->prepare('DELETE FROM posts WHERE id=?');
			$result = $sqlStatement->execute([$id]);
		}
		return $result;
	}
}
