import './bootstrap';
window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar');
    var scrolled = window.scrollY;
    if (scrolled >= 100) {
      navbar.classList.add('white');
      navbar.classList.remove('transparent');
    } else {
      navbar.classList.add('transparent');
      navbar.classList.remove('white');
    }
  });



  let articleSearch = document.getElementById('articleSearch');
        const articleResults = document.querySelector('.articleResults');
        function fetchArticleSearch(){
            
            let keyword = articleSearch.value;
            if(keyword){
            let url = "{{route('articleSearch')}}" + "?search=" +keyword;
            console.log(url);
            fetch(url)
            .then((resp)=>resp.json())
            .then((data)=>{
                console.log(data);
                data.map(article=>{
                    let list_item = document.createElement('a');
                    list_item.innerText = article.article_title;
                    let article_id = article.article_id
                    let route = "{{route('showArticle', ':id')}}";
                    list_item.href = route.replace(':id', article_id)
                    list_item.classList.add(['list-group-item'])
                    articleResults.appendChild(list_item);
                })
                data = [];
            })
            .catch(err=>{
                console.log(err);
            })
        };
            
        }