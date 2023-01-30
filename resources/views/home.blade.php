@extends('layouts.app')

@section('content')
<div class="cnt">
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

                <div class="mx-5 my-5 py-5 articles d-flex flex-column align-items-center">
                    <div class="py-5">
                        <div class="latest-article"></div>
                        <div>
                            <div class="grid-container">
                                @foreach ($remainingArticles as $article)    
                                <div class="grid-item">
                                    
                                    <!-- picture -->
                                    <div class="pic"></div>
                                    <!-- date and writer -->
                                    <div class="date_wirter"></div>
                                    <!-- article title -->
                                    <div class="article-title"></div>
                                    <!-- brief description -->
                                    <div class="description"></div>
                                    <!-- tags -->
                                    <div class="tags"></div>
                                     <!-- {{$article->article_title}}
                                    <br>
                                    {{$article->article_text}}
                                </div> -->
                                @endforeach
                            </div>
                            {!! $remainingArticles->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>

                          
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
