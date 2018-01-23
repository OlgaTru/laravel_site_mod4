@extends('admin')
@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создать новую статью @endslot
            @slot('parent') Главная @endslot
            @slot('active') <a href="{{ route('article.index') }}">Статьи</a> @endslot
        @endcomponent
            <hr/>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                   <form class="form-horizontal" action="{{route('article.store')}}" method="post">
                        {{csrf_field()}}
                        @include('admin.articles.partials.form-create')
                    </form>

                </div>
            </div>


@endsection
