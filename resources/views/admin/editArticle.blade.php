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
            <form action="{{route('updateArticle', $article->article_id)}}" method="post" enctype="multipart/form-data">
                {{-- three fields : ( article_title, article_text, file ) --}}
                @csrf
                    <div class="form-group py-3">
                      <label class="py-1" for="title">Title</label>
                      <input type="text" name="article_title" value={{$article->article_title}} class="form-control" id="title"  placeholder="Enter title">
                    </div>
                    <div class="form-group py-3">
                      <label class="py-1" for="article_text">text</label>
                      <input type="text" name="article_text" value={{$article->article_text}} class="form-control" id="article_text" placeholder="Main Text">
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
    {{-- <script type="text/javascript">
      function fetchData(){
        const val = document.querySelector('#search').value;
        const url = "{{route('Tagsearch')}}" + "?search=" + val;
        console.log(url);
        fetch(url)
        .then((resp)=>resp.json())
        .then((data)=>{

          var tbodyref  = document.getElementById('tbodyfordata');
          tbodyref.innerHTML = '';
          
          let tags = data;
          for (let i = 0; i < tags.length; i++){
            console.log(tags[i])
            let tr = createNode('tr')
            let Tname = createNode('td')
            let Action = createNode('button')
            Action.innerText = "add"
            Action.classList.add('btn')
            Action.classList.add('btn-primary')
            Action.addEventListener('click',addArticleTag())
            Tname.innerText = tags[i].tag_name;
            append(tr,Tname);  
            append(tr,Action)
            append(tbodyref,tr);
            
          }
          
        })
        .catch(function(error){
          console.log(error);
		    })
      }
      function addArticleTag(){
        console.log(this)
        let url = "{{route('addArticleTag')}}"
        fetch(url, {
              headers: {
                  "Content-Type": "application/json",
                  "Accept": "application/json, text-plain, */*",
                  "X-Requested-With": "XMLHttpRequest",
                  "X-CSRF-TOKEN": token
                  },
              method: 'post',
              credentials: "same-origin",
              body: JSON.stringify({
                  tag_name: this.tag_name,
                  tag_id: this.tag_id
              })
          })
          // .then((data) => {
          //     window.location.href = redirect;
          // })
          .catch(function(error) {
              console.log(error);
          });
      }
      function createNode(element)
      {
        return document.createElement(element);
      }
      
      function append(parent,el)
      {
        return parent.appendChild(el);
      }
      // tags.map(tag=>{
        //   console.log(tag)
        // })
        // tags.map(tag=>{
          //     Tname.innerText = tag.name;
          //     append(tr,Tname);
          //     append(tbodyref,tr);
          //   });	
      </script> --}}
@endsection
