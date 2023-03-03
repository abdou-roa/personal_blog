@extends('layouts.app')
@section('content')
{{-- {{dd($categoryArticles)}} --}}
<div class="cnt">
    <div class="d-flex justify-content-center">
        <h1>{{$catagory_name}}</h1>
    </div>
    <div class="py-5 px-5 remaining-container">
        <div class="grid-container my-4">
            @foreach ($categoryArticles as $article)    
            {{-- {{dd($article->article_id)}} --}}
            <div class="grid-item d-flex flex-column align-items-start">
                <div class="img">
                    

                    @if ($article->article_image)
                        <img class="article-pic" src="{{asset('storage/'.$article->article_image)}}">
                    @else
                        <img class="article-pic" src="{{asset('storage/images/defaultblogimg.png')}}">
                    @endif
                </div>
                <div class="remaining-info d-flex flex-column align-items-start">
                    <div class="article-date">{{$article->created_at}}</div>
                    <a href="{{route('showArticle', $article->article_id)}}"><div class="article-title">{{$article->article_title}}</div></a>
                    
                </div>
            </div>
            @endforeach
        </div>
        {!! $categoryArticles->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection