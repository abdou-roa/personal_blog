<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoryName)
    {
        $categoryArticles = DB::table('articles')->where('category', 'LIKE', '%'.$categoryName.'%')->paginate(6);
        return view('categoryArticles', compact('categoryArticles'));
    }

    //show articles in the admin panel
    public function showAdminArticles(){
        $articles = Article::all();
        return view('admin.adminArticles',compact('articles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article;
        //increase article count in the categories table 
        DB::table('categories')->where('category_name', '=', $request->category)->increment('article_count');
        
        $file = $request->file('article_image');
        $fileName = time(). '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('images', $fileName);
        $article->article_image = $path;
        $article->article_title = $request->article_title;
        $article->article_text = $request->article_text;
        $article->category = $request->category;

        $article->save();


        session()->flash('success', 'Image Upload successfully');

        return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $article = DB::table('articles')
        ->where('article_id','=', $id)
        ->first();
        // $article = Article::whereUuid($articleID)->firstOrFail();
        return(view('blogPost',compact('article')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = Article::where('article_id','=',$id)->first();
        $categories = Category::all();
        return view('admin.editArticle', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        DB::table('categories')->where('category_name', '=', $request->category)->increment('article_count');
        
        $file = $request->file('article_image');
        $fileName = time(). '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('images', $fileName);
        $article = Article::where('article_id','=',$id)->update(['article_image'=>$path, 'article_title'=>$request->article_title, 'article_text'=>$request->article_text, 'category'=>$request->category]);
        return redirect()->route('showAdminArticles');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::where('article_id','=',$id);
        $article->delete();
        return redirect()->back();
    }
}
