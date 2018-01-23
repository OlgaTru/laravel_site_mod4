@extends('app')

@section('content')
	{{--<div class="row col-md-8">--}}
        {{--<h2 class="category-name" style="text-transform: capitalize; color: #8c8c8c ">{{ $category_name }}</h2>--}}

    <div class="row col-md-8">
        <h5 class="category-name" style="text-transform: capitalize; text-align:left ">Раздел: <a style="text-decoration: none; font-weight: bold" href="{{route('showCategory', ['id' => $article->category_id])}}">{{ $category_name }}</a></h5>

        <div class="well">
            <h3 style="text-align: center">{{$article->title}}</h3>
            <img style="float: left; margin:15px" src="{{$article->img}}" class="img-responsive"/>
            <p>{{ $article->content }}</p>
            <hr>
            <p style="font-size: x-small; font-weight: bold">Опубликовано: {{$article->created_at}}</p>
        </div>

        @foreach($article->keywords as $keyword)
            <a href="{{route('articleListByTag', ['id' => $keyword->id])}}" style="text-decoration: none; font-size: large"><span class="label label-default" style="font-weight: 400">{{$keyword->keyword}}</span></a>
        @endforeach

        <div style="padding-top: 20px">
            @include('layouts.comment-form', ['reply_id' => NULL, 'article_id' => $article->id])
            @include('layouts.comments')
        </div>

    </div>

@stop


@push('scripts')
    <script>
        function reply(reply_id) {
            var formName = 'div[name="form' + reply_id + '"]';
            $(formName).attr('class', '');

            var btnName = 'div[name="button' + reply_id + '"]';
            $(btnName).attr('class', 'hidden');
        }
    </script>
@endpush

