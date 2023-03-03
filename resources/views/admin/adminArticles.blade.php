@extends('layouts.app')

@section('content')
<div class="cnt p-5">
    <div class="m-auto">
        <h1>Articles</h1>
    </div>
    <div class="d-flex justify-content-center articles-table px-5">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">article name</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)   
                    <tr>
                        <th scope="row"><a href="{{route('showArticle',$article->article_id)}}">{{$article->article_title}}</a></th>
                        <th class="d-flex justify-content-center"><a href="{{route('deleteArticle',$article->article_id)}}"><button class="btn btn-danger mx-1">delete</button></a><a href="{{route('editArticle',$article->article_id)}}"><button class="btn btn-warning mx-1">edit</button></a></th>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection