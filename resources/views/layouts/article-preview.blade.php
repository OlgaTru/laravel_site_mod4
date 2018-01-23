<div class="well">

    @if($article->analytics)
        <h3>{{ $article->title }}<span class="label label-warning" style="vertical-align: super;
            font-size: x-small; margin-left: 5px">Аналитика</span></h3>
    @else
        <h3>{{ $article->title }}</h3>
    @endif

    <p style="font-size: x-small; font-weight: bold">Опубликовано: {{$article->created_at}}</p>
    <p>{{ $article->description }}</p>
        @foreach($article->keywords as $keyword)
            <a href="{{route('articleListByTag', ['id' => $keyword->id])}}" style="text-decoration: none; font-size: large">
                    <span class="label label-default" style="font-weight: 400">{{$keyword->keyword}}</span></a>
        @endforeach
    <a class="btn btn-default pull-right" href="{{route('showArticle', ['id' => $article->id])}}" role="button">Читать далее &raquo;</a>

</div>