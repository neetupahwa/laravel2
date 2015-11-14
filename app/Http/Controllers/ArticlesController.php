<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class ArticlesController extends Controller
{
   
   
    public function index()
    {
        $articles = Article::all();
        
        return view('articles.index')->with('articles', $articles);
    }

     public function show($id){
        $article = Article::findorFail($id);

        if (is_null($article)){
            abort(404);
        }
        return view ('articles.show', compact('article'));
    }

}