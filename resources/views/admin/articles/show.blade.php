@extends('admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Просмотреть статью @endslot
            @slot('parent') Главная @endslot
            @slot('active') <a href="{{ route('article.index') }}">Статьи</a> @endslot
        @endcomponent
        <hr/>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">


                <div class="form-group">
                    <strong>Название:</strong>
                    {{ $article->title}}
                </div>

                <div class="form-group">
                    <strong>Категория:</strong>
                    <span style="text-transform: capitalize">{{ $article->category}}</span>
                </div>

                <div class="form-group">
                    <strong>Содержание:</strong>
                    {{ $article->content}}
                </div>
            </div>
        </div>
    </div>

@endsection