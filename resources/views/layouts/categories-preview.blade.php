@foreach($categories as $index => $category)
    <div class="col-md-2">
        <h3 style="text-align: center; text-transform: capitalize"><a style="text-decoration: none" href="{{route('showCategory', ['id' => $category->id])}}">{{$category->category}}</a></h3>
        <hr>
        @foreach($article_groups[$index] as $article)
            <div class="well">
                <h4 style="text-align: center"><a href="{{route('showArticle', ['id' => $article->id])}}">{{$article->title}}</a></h4>
                <p {{--style="text-align: center"--}}>{{$article->description}}</p>
            </div>
        @endforeach
        <p><a class="btn btn-default" href="{{route('showCategory', ['id' => $category->id])}}">Перейти в категорию &raquo;</a></p>
    </div>
@endforeach

