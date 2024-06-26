<?php

use core\Router;

use src\Controllers\ArticleController;
use src\Controllers\LoginController;
use src\Controllers\LogoutController;
use src\Controllers\RegistrationController;
use src\Controllers\SettingsController;
use src\Controllers\AboutController as AboutHandleController; // this is equavalent to just not including the as as long as its the same class naem at the end
use src\Controllers\UpdateController;

Router::get('/', [ArticleController::class, 'index']); // the root/index page

// User/Auth related

// when a HTTP GET request is made to /login, run LoginController@index
Router::get('/login', [LoginController::class, 'index']);// handle rendering the login page
Router::post('/login', [LoginController::class, 'login']); // handle form submission

Router::get('/register', [RegistrationController::class, 'index']); // show registration form.
Router::post('/register', [RegistrationController::class, 'register']); // process a registration req.

Router::post('/logout', [LogoutController::class, 'logout']);

// Article related
Router::post('/update', [ArticleController::class, 'edit']);
Router::post('/update_article', [ArticleController::class, 'update']);

Router::get('/new_article', [ArticleController::class, 'create']); // its not a form its just a link so we do a get
Router::post('/new_article/store', [ArticleController::class, 'store']);

Router::post('/delete', [ArticleController::class, 'delete']);

// TODO: set up routes for all the article and settings functions
Router::get('/about', [AboutHandleController::class, 'index']);

Router::post('/settings', [SettingsController::class, 'index']);
Router::post('/settings/save', [SettingsController::class, 'update']);
