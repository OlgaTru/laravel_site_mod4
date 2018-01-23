@extends('admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Редактировать статью @endslot
            @slot('parent') Главная @endslot
            @slot('active') <a href="{{ route('article.index') }}">Статьи</a> @endslot
       @endcomponent
        <hr/>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

    {!! Form::model($article, ['method' => 'PATCH','route' => ['article.update', $article->id]]) !!}

    @include('admin.articles.partials.form')

    {!! Form::close() !!}
                </div>
            </div>

@endsection