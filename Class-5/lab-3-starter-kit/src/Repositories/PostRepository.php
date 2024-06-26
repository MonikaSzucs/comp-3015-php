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
	 * @param string $username
	 * @param string $password
	 * @return Post|false
	 *
	 * This is horrible! Let's exploit the vulnerability and drop the database.
	 *
	 * Do not do SQL injection attacks on software that you don't own.
	 */
	public function savePost(string $username, string $password): Post|false {
		$createdAt = date('Y-m-d H:i:s');
		// 1. tells us what to execute with database
		// exec or prepare
		// send query itself to database first without variable data
		// prepare will help prevent from SQL injections
		$statement = $this->pdo->prepare("INSERT INTO posts (created_at, updated_at, username, password) VALUES (?, NULL, ?, ?);");
		// this one provides data to fill database in queries
		$success = $statement->execute([$createdAt, $username, $password]);
		// teacher wants this prepare and execute keep it like this.
		if ($success) {
		//if ($rowsChanged === 1) {
			// 2. get the last ID inserted
			$id = $this->pdo->lastInsertId();
			// 3. issue a select query to the DB
			$sqlStatement = "SELECT * FROM posts where id = $id";
			$result = $this->pdo->query($sqlStatement);
			// 4. fetch the result as an associative array, and turn it into an object
			return new Post($result->fetch());
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
			$resultSet = $sqlStatement->fetch();
			return new Post($resultSet);
		}
		
		return false;
	}

	/**
	 * @param int $id
	 * @return bool true on success, false otherwise
	 */
	public function deletePostById(int $id): bool {
		// TODO
		return false;
	}
}
