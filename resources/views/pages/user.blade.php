@extends('app')

@section('content')


    <div class="row col-md-8">

        <h1 style="text-transform: capitalize; color: #8c8c8c; text-align: center ">{{ $user->name }}</h1>
        @foreach($comments as $comment)
            <div class="well">
                <h3>Написал: {{ $comment->message }}</h3>
                <p>В статье "{{$comment->title}}"</p>
                <p><a class="btn btn-default" href="{{route('showArticle', ['id' => $comment->article_id])}}" role="button">Перейти к статье &raquo;</a></p>
            </div>
        @endforeach
        {{ $comments->links() }}

    </div>


@stop
