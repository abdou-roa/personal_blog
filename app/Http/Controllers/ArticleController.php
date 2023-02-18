<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //redirecting to add article page
        $categories=DB::table('categories')
        ->get();
        return view('admin.addArticle',compact('categories'));

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
        //
        // $this->validate($request,[
        //     'article_name'=> 'required|text|min:15',
        //     'article_text'=>'required|text|min:100',
        //     'file'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        // ]);
        // $data = Article::create([
        //     'file' => $image_path, 
        //     'article_title' => $article_title,
        //     'article_text' => $article_text,
        //     'category' => $category,
        // ]);
        $article = new Article;

        // $imageName = time().'.'.$request->file('article_image')->extension();  
       

        //increase article count in the categories table 
        DB::table('categories')->where('category_name', '=', $request->category)->increment('article_count');
        // ->update([]);
        //
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
    }
}
