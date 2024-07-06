<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteArticleRequest;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Form;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = DB::table('articles')->select('id', 'title', 'url', 'created_at', 'updated_at')->get();
        return response()->json(['articles' => [$data]]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    public function create()
    {
        $view = view('add-article');
        echo $view;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        //
        $article = new Article();
        $article->title = $request->input('title');
        $article->url = $request->input('url');
        $created_at = date('d-m-y h:i:s');
        $updated_at = $created_at;

        $data = DB::insert('insert into articles(title, url, created_at, updated_at) values (?,?,?,?)', [$article->title, $article->url, $created_at, $updated_at]);
        return response()->json(['insertSuccessful' => [$data]]);
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $article_id)
    {
        //
        $indexResponse = $this->index();
        $found = null;

        // Decode the JSON response to get the articles array
        $articles = json_decode($indexResponse->getContent(), true)['articles'][0];
        foreach ($articles as $article) {
            //print_r($article);
            if ($article['id'] == $article_id) {
                $found = $article;
                break;
            }
        }

        // show the form with the title and url value of $found
        $view = view('edit-article', ['article' => $found]);
        echo $view;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, int $article_id)
    {
        //
        // print_r($request->input('title'));
        // print_r($request->input('url'));
        // print_r($article_id);

        $data = DB::update('UPDATE articles SET title=?, url=? WHERE id=?', [$request->input('title'), $request->input('url'), $article_id]);
        return response()->json(['updateSuccessful' => [$data]]);
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete(int $article_id) {
        $indexResponse = $this->index();
        $found = null;

        // Decode the JSON response to get the articles array
        $articles = json_decode($indexResponse->getContent(), true)['articles'][0];
        foreach ($articles as $article) {
            //print_r($article);
            if ($article['id'] == $article_id) {
                $found = $article;
                break;
            }
        }

        // show the form with the title and url value of $found
        $view = view('delete-article', ['article' => $found]);
        echo $view;
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Article $article) 
    public function destroy(DeleteArticleRequest $request, int $article_id)
    {
        //
        // print_r($article_id);
        // print_r($request->input('id'));
        // print_r($request->input('title'));

        $data = DB::delete('DELETE FROM articles WHERE id=?', [$article_id]);
        return response()->json(['deleteSuccessful' => [$data]]);
    }
}
