<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $categories = Category::all()->get(function($data){
        //     return $data->count();
        // });
        $categories = Category::all()->sortByDesc('created_at');
        $articlesNumber = $categories->count();
        return view('admin.category.manageCategories',compact('categories', 'articlesNumber'));
    }

    public function addCategory(){
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
        return view('admin.category.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCat = new Category ;
        $newCat->category_name = $request->category_name;
        $newCat->save();
        return redirect()->route('manageCategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $category = DB::table('categories')
        ->where('category_id', '=', $id)->first();
        // $category = $categorye['0'];
        return view('admin.category.editCategory',compact('category'));
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
        // $category = DB::table('categories')
        // ->where('category_id', '=', $id)
        // ->get();

        DB::table('categories')
        ->where('category_id', '=', $id)
        ->update(['category_name'=>$request->category_name]);

        // $category->category_name = $request->category_name;
        // $category->save();
        return redirect()->route('manageCategories');
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
        
        $category = DB::table('categories')
        ->where('category_id', '=', $id);
        $category->delete();
        return redirect()->back();
    }
}
