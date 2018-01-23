@extends('app')

@section('content')

    <div class="row col-md-8">

        <h4 style="text-align: left; text-transform: capitalize"><b>{{ $category->category }}</b></h4>
        @foreach($articles as $article)

            @include('layouts.article-preview')

        @endforeach
        {{ $articles->links() }}

    </div>


@stop