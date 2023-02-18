@extends('layouts.app')

@section('content')
<style>
    .cnt{
        height: 100vh;
        width: 100vw;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
    <div class="cont p-5">
        {{-- {{dd($categories)}} --}}
        <div class="px-5 d-flex justify-content-center py-3"><h1>Categories</h1></div>
        <div class="categories-table d-flex flex-column align-items-center px-5">
            {{-- another div that will inlude the add button and maybe other things --}}
            <div class="d-flex justify-content-end w-100 py-3">
                <a href="{{route('addCategory')}}"><button class="btn btn-primary">Add Category</button></a>
            </div>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">category name</th>
                    <th scope="col">number of articles</th>
                    <th scope="col">actions</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)   
                        <tr>
                            <th scope="row">{{$category->category_name}}</th>

                            <td>{{$articlesNumber}}</td>

                            <td class="d-flex justify-content-end">
                                <a href="{{route('editCategory', $category->category_id )}}"><button class="btn btn-warning m-1">Edit</button></a>
                                
                                {{-- <a href=""><button class="btn btn-danger m-1">Delete</button></a> --}}

                                <form action="{{route('deleteCategory', $category->category_id )}}" method="post" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-1" type="submit">Delete</button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection