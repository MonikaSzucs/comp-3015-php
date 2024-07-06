<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// http://localhost:8000/api/articles
Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/store', [ArticleController::class, 'create']);
Route::post('/store/submit', [ArticleController::class, 'store']);

// http://localhost:8000/api/1

// format for route is as follows
// Route:: HTTP_METHOD (  '/ENDPOINT/{INPUT}',  [CLASS - where the function is found, 'METHOD_NAME']  ) -> PAGE_TO_GO_TO
// http method: get, post, put, delete...
// ->name('edit-article) ---> it goes to edit-article.blade.php

Route::get('/edit/{article_id}', [ArticleController::class, 'edit'])->name('edit-article'); // can be anything in {}
Route::put('/update/{article_id}/submit', [ArticleController::class, 'update']);

Route::get('/delete/{article_id}', [ArticleController::class, 'delete'])->name('delete-article');
Route::delete('/remove/{article_id}/submit', [ArticleController::class, 'destroy']);