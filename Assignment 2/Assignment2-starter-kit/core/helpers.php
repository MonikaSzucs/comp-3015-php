<?php

function image(string $filename): string {
	return "/images/$filename";
}

function validatePassword(string $password): bool {
	return strlen($password) > 8 && preg_match('/^(?=.*[@_!#$%^&*()<>?\/\\|}{~:]).{9,}$/', $password);
}