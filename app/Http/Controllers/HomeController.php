<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latest = Article::latest()->first();
        $remainingArticles = Article::skip(1)->take(count(Article::all())-1)->paginate(6);
        return view('home',compact('latest','remainingArticles'));
    }
}
