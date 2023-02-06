@extends('layouts.app')

@section('content')
<div class="cnt py-5">
    <div class="row justify-content-center">
        <div class="col-12 inside-container">
            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div> --}}



                {{-- title section --}}

                <div class="title-area d-flex flex-column align-items-center">
                    <h3 class="tiny-title">The blog</h3>
                <h1 class="big-title"><strong>Writings from me</strong></h1>
                    <h3 class="middle-title">Latest industry news, interviews, technologies, and resources.</h3>
                </div>


                {{-- blog articles section --}}

                <div class="mx-5  articles d-flex flex-column align-items-center">
                    {{-- @if ($remainingArticles) --}}
                    <div class="py-5">
                        @if ($remainingArticles->currentPage() == 1)
                            <div class="latest-article d-flex flex-column align-items-center py-5">
                            <div class="latest-article-picture">
                                @if ($latest->article_image)
                                    <img class="latest_article_image" src="{{asset('storage/'.$latest->article_image)}}" width="300px" height="100%">
                                @else
                                    <img class="latest_article_image" src="{{asset('storage/images/defaultblogimg.png')}}" width="300px" height="100%">
                                @endif
                            </div>
                            <div class="remaining-info d-flex flex-column align-items-center">
                                <div class="article-date">{{$latest->created_at->format('d/m/Y')}}</div>
                                <div class="article-title">{{$latest->article_title}}</div>
                            </div>
                            </div>
                        @endif
                        <div class="py-5 px-5 remaining-container">
                            <div class="grid-container my-4">
                                @foreach ($remainingArticles as $article)    
                                <div class="grid-item d-flex flex-column align-items-start">
                                    <div class="img">
                                        

                                        @if ($article->article_image)
                                            <img class="article-pic" src="{{asset('storage/'.$article->article_image)}}">
                                        @else
                                            <img class="article-pic" src="{{asset('storage/images/defaultblogimg.png')}}">
                                        @endif
                                    </div>
                                    <div class="remaining-info d-flex flex-column align-items-start">
                                        <div class="article-date">{{$article->created_at->format('d/m/Y')}}</div>
                                        <div class="article-title">{{$article->article_title}}</div>
                                    </div>
                                </div>
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
