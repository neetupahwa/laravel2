<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Request;
use Carbon\Carbon;

class ArticlesController extends Controller
{
   
   
    public function index()
    {
        $articles = Article::latest('published_at')->get();
        
        return view('articles.index')->with('articles', $articles);
    }

     public function show($id){
        $article = Article::findorFail($id);

        if (is_null($article)){
            abort(404);
        }
        return view ('articles.show', compact('article'));
    }

    public function create(){
        return view('articles.create');
    }

    public function store(){
        $input = Request::all();
        $input['published_at'] = Carbon::now();

        Article::create($input);
        return redirect('articles');
    }

}