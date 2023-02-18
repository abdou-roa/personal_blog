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
        <div class="px-5 d-flex justify-content-center py-3"><h1>Categories</h1></div>
        <div class="categories-table d-flex flex-column align-items-center px-5">
            {{-- another div that will inlude the add button and maybe other things --}}
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">category name</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)   
                        <tr>
                            <th scope="row"><a href="{{route('listCategory',$category->category_id)}}">{{$category->category_name}}</a></th>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection