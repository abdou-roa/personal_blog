@extends('layouts.app')

@section('content')
<style>
    .contain{
        height: 100vh;
        width: 100vw;
    }
    .containere{
        height: 100vh;
        width: 100vw;
    }
    .right-part{
        width: 20%;
    }
    .left-part{
        width: 80%;
    }
    .nav{
        align-items: flex-start;
    }
    .nav-off{
        align-items: flex-end;
    }
    .display-gone{
        display: none;
    }
    .display-here{
        display: block;
    }
    .side-bar{

        height: 100vh;
        left: 0px;
    }
    .toggle-button{
        border-radius: 50%;
        height: 20px;
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #eee;
        position: absolute;
        top: 150px;
        
        margin-right: -10px;
        opacity: 0.7;
    }
    .sb-nav-link{
        width: 100%;
        height: 3rem;
        /* border: 1px solid #eee; */
        display: flex;
        align-items: center;
        font-size: 20px;
    }
    .nav-link{
        text-decoration: none;
    }
    .link-name{
        font-size: 20px;
        font-weight: 700;
    }
    .top-aricles{
        width: 100%;
    }
    .list-top-articles{
        width: 60%;
    }
    .top-part{
        width: 60%;
    }
    .scores{
        width: 100%;
    }
    .scores li{
        display: flex;
        justify-content: center;
        border: 1px solid #444;
        border-radius: 5px;
    }
</style>
<div class="contain d-flex">
    <div class="side-bar h-100  bg-dark py-5">
        <button class="toggle-button" onclick="toggle()">
            <i class="fa-solid fa-greater-than"></i>
        </button>
    
        <div class="nav-links-cnt">
            <ul class="nav d-flex flex-column">
                <li class="sb-nav-link my-2 d-flex justify-content-start"><a href="" class="d-flex px-3 nav-link"><div class="icon px-4"><i class="fa-solid fa-chart-line"></i></div> <div class="link-name">Dashboard</div></a></li>
                <li class="sb-nav-link my-2 d-flex justify-content-start"><a href="" class="d-flex px-3 nav-link"><div class="icon px-4"><i class="fa-solid fa-newspaper"></i></div> <div class="link-name">Articles</div></a></li>
                <li class="sb-nav-link my-2 d-flex justify-content-start"><a href="" class="d-flex px-3 nav-link"><div class="icon px-4"><i class="fa-solid fa-inbox"></i></div> <div class="link-name">Inbox</div></a></li>
                <li class="sb-nav-link my-2 d-flex justify-content-start"><a href="{{route('manageCategories')}}" class="d-flex px-3 nav-link"><div class="icon px-4"><i class="fa-solid fa-tree"></i></div> <div class="link-name">Category</div></a></li>
                <li class="sb-nav-link my-2 d-flex justify-content-start"><a href="{{route('manageTags')}}" class="d-flex px-3 nav-link"><div class="icon px-4"><i class="fa-solid fa-tag"></i></div> <div class="link-name">Tags</div></a></li>
                <li class="sb-nav-link my-2 d-flex justify-content-start"><a href="" class="d-flex px-3 nav-link"><div class="icon px-4"><i class="fa-solid fa-chart-simple"></i></div> <div class="link-name">Analytics</div></a></li>
                <li class="sb-nav-link my-2 d-flex justify-content-start"><a href="" class="d-flex px-3 nav-link"><div class="icon px-4"><i class="fa-solid fa-calendar-days"></i></div> <div class="link-name">Post Plan</div></a></li>
            </ul>
        </div>
    </div>
    <div class="containere d-flex flex-column ">
        {{-- expandable navigation bar --}}
        
        {{-- dashboard --}}
        <div class="dashboard d-flex justify-content-start w-100">
            <div class="left-part d-flex flex-column align-items-center px-5 py-5 w-80">
                {{-- greeting and link to add article --}}
                <div class="greeting">
                    <div><h1>Hello {{auth()->user()->full_name}}</h1></div>
                    <div><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis perspiciatis temporibus facere sit vero numquam dolorem fugit commodi, error tenetur.</p></div>
                    <div>
                        <a href="{{route('addArticle')}}"><button class="btn btn-primary">Write new article</button></a>
                    </div>
                </div>
                <div class="top-aricles py-5 px-5 d-flex flex-column align-items-center">
                    <div class="top-part d-flex justify-content-between">
                        <h2>Top articles</h2>
                        <span>month</span>
                    </div>
                    <div class="list-top-articles">
                        <ul class="list-group py-3">
                            <li class="list-group-item d-flex px-3 py-3">
                                lorem ipsem
                                <div class="article"></div>
                                <div class="views-likes-saves d-flex">
                                    <div class="views"></div>
                                    <div class="likes"></div>
                                    <div class="saves"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
    
            </div>
            <div class="right-part d-flex flex-column align-items-center px-5 py-5">
                <ul class="scores list-group">
                    <li class="info-box total-earnings p-3  my-3">Earnings: 650$</li>
                    <li class="info-box article-request p-3  my-3">Article Request: 14</li>
                    <li class="info-box pending-articles p-3  my-3">Pending Post: 4</li>
                </ul>
                <div class="calendar">
                    
                </div>
            </div>
        </div>
    </div></div>   

<script>
    let toggle_btn = document.querySelector('.toggle-button');
    let side_bar = document.querySelector('.side-bar');
    let link_text =  document.querySelectorAll('.link-name');
    let name_off =  false;
    let nav = document.querySelector(".nav");
    function toggle(){
        if(name_off == false){
            for (const link of link_text){
                link.classList.add("d-none");
            }
            name_off = true;
        }else{
            for (const link of link_text){
                link.classList.remove("d-none");
            }
            name_off = false;
        }
    }
</script>


@endsection