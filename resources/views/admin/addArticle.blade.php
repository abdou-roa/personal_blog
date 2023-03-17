@extends('layouts.app')




@section('content')

<style>
    .cont{
        width: 100vw;
        height: 100vh;
    }
    .form{
        width: 100%;
        height: 100%;
    }
    .form form{
        width: 65%;
    }
    label{
        font-size: 17px;
        font-weight: 550;
    }
</style>

    <div class="cont d-flex flex-column align-items-center">
        <h1 class="">Add article</h1> 

        {{-- {{dd($categories)}} --}}
        
        
        
        {{-- form --}}
        <div class="form d-flex flex-column align-items-center">
            <form action="{{route('crateArticle')}}" method="post" enctype="multipart/form-data">
                {{-- three fields : ( article_title, article_text, file ) --}}
                @csrf
                    <div class="form-group py-3">
                      <label class="py-1" for="title">Title</label>
                      <input type="text" name="article_title" class="form-control" id="title"  placeholder="Enter title">
                    </div>
                    <div class="form-group py-3">
                      <label class="py-1" for="article_text">text</label>
                      <input type="text" name="article_text" class="form-control" id="article_text" placeholder="Main Text">
                    </div>
                    <div class="group-form py-3 d-flex flex-column align-items-start">
                        <label class="py-1" for="category">Category</label>
                        <select class="custom-select" size="3" id="category" name="category">
                            <option selected>lelect Category</option>
                            @foreach ($categories as $category)
                              <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                          </select>
                    </div>
                    {{-- <div class="form-group py-3">
                      <div class="form-groupmy-3 ">
                        <input type="text" name="search" id="search" class="form-controller" placeholder="Tag name" onkeyup="fetchData()">
                      </div>
                      <table class="my-3 table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Tag name</th>
                            <th>action</th>
                          </tr>
                        </thead>
                        <tbody id="tbodyfordata">
                          <!-- Data will be appened here -->
                        </tbody>
                      </table>
                    </div> --}}

                    <div class="custom-file py-3">
                        <input name="article_image" type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label " for="customFile">Choose file</label>
                      </div>
                    <button type="submit py-3" class="btn btn-primary">Submit</button>
                
            </form>
        </div>
    </div>   
     
@endsection
