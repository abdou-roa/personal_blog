@extends('layouts.app')

@section('content')
<div class="cnt d-flex justify-content-between p-5">
    {{-- {{dd($article)}} --}}
    {{-- a hero banner with the post image and the title then the content  --}}

    {{-- post image --}}

    <div class="left-side d-flex flex-column align-items-center">
        <div class="img-container py-5 d-flex flex-column align-items-center">
            <img src="{{asset('storage/'.$article->article_image)}}" height="400px" width="400px" alt="">
        </div>
    
        {{-- post title --}}
    
        <div class="title-container">
            <h1>{{$article->article_title}}</h1>
        </div>
    
        {{-- post content --}}
    
        <div class="content-container py-3">
            <div class="content">
                <p>
                    {{$article->article_text}}
                </p>
            </div>
        </div>
    </div>
    
    <div class="right-side d-flex flex-column align-items-center">
        <div class="adds">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div>
        </div>
        <div class="related-topics my-3">
            <div class="card" style="width: 18rem; height: 40rem;">
                <div class="card-body">
                  <h5 class="card-title">Related Topics</h5>
                </div>
              </div>
        </div>
    </div>
    {{-- adds area bisides the content in desktop --}}
</div>
@endsection