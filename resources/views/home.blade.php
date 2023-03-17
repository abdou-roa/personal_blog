@extends('layouts.app')

@section('content')
@vite(['resources/sass/home.scss', 'resources/js/home.js', 'resources/css/home.css'])
<div class="cnt">
    <div class="row justify-content-center">
        <div class="col-12 inside-container">
                
                <div class="Hero-banner title-area d-flex flex-column align-items-center pt-5 text-light">
                    <div class="hero-content d-flex flex-column align-items-center justify-content-center mb-5">
                        <h3 class="tiny-title">The blog</h3>
                        <h1 class="big-title"><strong>Writings from me</strong></h1>
                        <h3 class="middle-title">Latest industry news, interviews, technologies, and resources.</h3>
                        <div class="buttons">
                            <a href="#" class="btn btn-warning">subscribe</a>
                            <a href="#articles" class="btn btn-secondary">Read articles</a>
                        </div>
                    </div>
                </div>


                {{-- blog articles section --}}

                <div id="articles" class="mx-5  articles d-flex flex-column align-items-center">
                    {{-- @if ($remainingArticles) --}}
                    <div class="d-flex flex-column align-items-center py-5">
                        @if ($remainingArticles->currentPage() == 1)
                        <h2>Latest article</h2>
                        <a href="{{route('showArticle', $latest->article_id)}}">
                            <div class="latest-article d-flex flex-column align-items-center pb-5 mt-4">
                            <div class="latest-article-picture">
                                @if ($latest->article_image)
                                    <img class="latest_article_image" src="{{asset('storage/'.$latest->article_image)}}" width="300px" height="100%">
                                @else
                                    <img class="latest_article_image" src="{{asset('storage/images/defaultblogimg.png')}}" width="300px" height="100%">
                                @endif
                            </div>
                            <div class="remaining-info d-flex flex-column align-items-center">
                                <div class="latest-article-date">{{$latest->created_at->format('d/m/Y')}}</div>
                                <div class="latest-article-title">{{$latest->article_title}}</div>
                            </div>
                            </div>
                        </a>
                        @endif
                        <div class="py-5 px-5 remaining-container">
                            <h2 class="text-center">Top articles</h2>
                            <div class="grid-container my-4">
                                @foreach ($remainingArticles as $article)    
                                {{-- {{dd($article->article_id)}} --}}
                                <a href="{{route('showArticle', $article->article_id)}}">
                                <div class="grid-item d-flex flex-column align-items-start">
                                    <div class="img my-3">
                                        @if ($article->article_image)
                                            <img class="article-pic" src="{{asset('storage/'.$article->article_image)}}">
                                        @else
                                            <img class="article-pic" src="{{asset('storage/images/defaultblogimg.png')}}">
                                        @endif
                                    </div>
                                    <div class="remaining-info d-flex flex-column align-items-start">
                                        <div class="article-date"><p>{{$article->created_at->format('d/m/Y')}}</p></div>
                                        <div class="article-title"><p>{{$article->article_title}}</p></div>
                                        
                                    </div>
                                </div>
                            </a>
                                @endforeach
                            </div>
                            {!! $remainingArticles->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>

                          
                    </div>
                    {{-- @endif --}}
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
