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
        <div class="px-5 d-flex justify-content-center py-3"><h1>update category</h1></div>
        <div class="form-ctn px-5 d-flex justify-content-center">
            <form action="{{route('updateCategory', $category->category_id )}}" method="POST" class="px-5 py-3">
                @csrf
                <div class="mb-3">
                  <label for="categoryName" class="form-label" >Catagory Name</label>
                  <input type="text" class="form-control" id="categoryName" name="category_name" value="{{$category}}">
                </div>
    
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
@endsection