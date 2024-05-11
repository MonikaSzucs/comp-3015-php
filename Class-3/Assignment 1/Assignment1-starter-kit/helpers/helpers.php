<?php

function validTitle(string $title): bool {
	return strlen($title) > 5;
}

function validLink(string $link): bool {
	return filter_var($link, FILTER_VALIDATE_URL);
}
