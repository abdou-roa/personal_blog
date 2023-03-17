<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleLiveSearch extends Controller
{
    //
    public function index(Request $request){
        $search = $request->get('search');
        $articles = Article::where('article_title', 'LIKE', '%'.$search.'%')->get();
        if(! $articles){
            $articles = ['No Articles with such name!'];
            return response()->json($articles);
        }
        return response()->json($articles);
    }
}
