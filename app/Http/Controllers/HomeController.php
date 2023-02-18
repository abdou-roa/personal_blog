<?php

namespace App\Http\Controllers;

use App\Models\Article;
// use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        // $user = Auth::user();
        // $admin = Auth::user
        return view('home',compact('latest','remainingArticles'));
    }
}
