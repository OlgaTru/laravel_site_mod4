
<div class="col-md-4 col-md-offset-2">
    <h2>TOP-5 Комментаторов</h2>
    <hr>
    @foreach($top_commentators as $commentator)
        <div class="well">
            <h4><a class="article-name" href="{{route('showUser', ['id' => $commentator->id])}}">{{ $commentator->name }}</a></h4>
            <p>{{ $commentator->comments_count }} comments.</p>
        </div>
    @endforeach
</div>

<div class="col-md-4">
    <h2>TOP-3 Активные темы</h2>
    <hr>
    @foreach($top_articles as $article)
        <div class="well">
            <h4><a class="article-name" href="{{route('showArticle', ['id' => $article->id])}}">{{$article->title}}</a></h4>
            <p>{{$article->description}}</p>
        </div>
    @endforeach
</div>
