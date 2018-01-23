@extends('app')

@section('content')

    <div class="row col-md-8">
        @if($keywords)
            <h5 style="text-align: left">Список статей по тегу: <b>{{$keywords->keyword}}</b></h5>
            @foreach($keywords->articles as $article)
           {{-- <div class="well">--}}
                @include('layouts.article-preview')


                {{--@if($article->analytics)
                    <h3>{{ $article->title }}<span class="label label-warning" style="vertical-align: super;
                font-size: x-small; margin-left: 5px">Аналитика</span></h3>
                @else
                    <h3>{{ $article->title }}</h3>
                @endif

                <p style="font-size: x-small; font-weight: bold">Опубликовано: {{$article->created_at}}</p>
                <p>{{ $article->description }}</p>
                <p style="text-align: right"><a class="btn btn-default" href="{{route('showArticle', ['id' => $article->id])}}" role="button">Читать далее &raquo;</a></p>
    --}}
            {{--</div>--}}
            @endforeach
        @else
            <h1>Ничего не найдено!</h1>
        @endif
   </div>

@stop



