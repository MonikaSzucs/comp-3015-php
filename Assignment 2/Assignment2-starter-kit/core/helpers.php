<?php

use src\Models\Article;

function image(string $filename): string {
	return "/images/$filename";
}

function validatePassword(string $password): bool {
	return strlen($password) > 8;
	// && preg_match('/^(?=.*[@_!#$%^&*()<>?\/\\|}{~:]).{9,}$/', $password);
}

function userIsAunthenticated(): bool {
	if ($_SESSION['user_id']) {
		//print_r("USER ID IS INSIDE SESSION: " . $_SESSION['user_id']);
		return true;
	} else {
		//print_r("USER ID IS ** NOT ** INSIDE SESSION: " . $_SESSION['user_id']);
		return false;
	}
}

function authenticateForEdit(Article $article): bool {
	return $article->author_id == $_SESSION['user_id'];
}