<?php

namespace App\Http\Controllers;

use Request;
use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;


class ArticlesController extends Controller
{

    public function __construct()
    {
        //all must be login
        //$this->middleware('auth');
        
        //only page tertentu
        $this->middleware('auth', ['only' => 'create']);
    }

    public function index()
    {
    	$articles = Article::latest('updated_at')->get();
    	return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
     	return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $article = new Article($request->all()); //user_id
        \Auth::user()->articles()->save($article);
    	//Article::create($request->all());

    	return redirect('articles');
    }

    public function edit(Article $article)
    {
    	return view('articles.edit', compact('article'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
    	$article->update($request->all());
    	return redirect('articles');
    }

}
