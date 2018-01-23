@extends('app')

@section('content')

    <div class="row col-md-8">
        <h4 style="text-align: left"><b>Аналитика</b></h4>
        @foreach($articles as $article)

            @include('layouts.article-preview')

        @endforeach
    </div>

@stop
