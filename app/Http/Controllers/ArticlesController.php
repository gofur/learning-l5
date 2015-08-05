<?php

namespace App\Http\Controllers;

use Request;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
    	$articles = Article::latest('updated_at')->get();
    	return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
    	$article = Article::findOrFail($id);

    	return view('articles.show', compact('article'));
    }

    public function create()
    {
    	return view('articles.create');
    }

    public function store()
    {
    	$input = Request::all();
    	Article::create($input);
    	return redirect('articles');
    }
}
