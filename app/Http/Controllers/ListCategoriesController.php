<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListCategoriesController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all()->sortBy('created_at');
        return view('listCategories',compact('categories'));
    }
    public function show($id){
        $category = DB::table('categories')->where('category_id', '=', $id)->first();
        $catagory_name = $category->category_name;
        $categoryArticles = DB::table('articles')->where('category', '=', $catagory_name)->paginate(6);
        return view('categoryArticles', compact('categoryArticles', 'catagory_name'));
    }
}
