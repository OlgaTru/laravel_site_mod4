@extends('app')

@section('content')

    <div class="row col-md-8">
        <h5 style="text-align: left; font-weight: bold">Список всех статей</h5>
        @foreach($articles as $article)

            @include('layouts.article-preview')

        @endforeach
        {{ $articles->links() }}
    </div>

@stop
