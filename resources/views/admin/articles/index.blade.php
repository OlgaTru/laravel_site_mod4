@extends('admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title')Список статей
            <a class="btn btn-success btn-md pull-right" href="{{ route('article.create') }}">
                <i class="fa fa-plus-square-o" aria-hidden="true"></i> Создать статью</i></a>
            @endslot
            @slot('parent')Главная @endslot
            @slot('active')Статьи @endslot
        @endcomponent
        <hr>

        @section('content')

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif



            <table class="table table-bordered table-responsive table-hover">
               <thead>
                   <tr>
                       <th class="col-md-1" style="text-align:center">№</th>
                       <th class="col-md-1" style="text-align:center">Название статьи</th>
                       <th class="col-md-1" style="text-align:center">Категория</th>
                       <th class="col-md-5" style="text-align:center">Краткое описание</th>
                       <th class="col-md-2" style="text-align:center">Теги</th>
                       <th class="col-md-2" style="text-align:center">Действия</th>
                   </tr>
               </thead>
                <tbody>
                @foreach ($articles as $article)
                <tr>
                    <td style="text-align:center">{{ ++$i }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category }}</td>
                    <td>{{ $article->description }}</td>
                    <td>@foreach($article->keywords as $keyword) <p>[{{ $keyword->keyword }}] </p>@endforeach</td>
                    <td style="text-align:center">
                        <a class="btn btn-info btn-sm" href="{{ route('article.show',$article->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-primary btn-sm" href="{{ route('article.edit',$article->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        {!! Form::open(['method' => 'DELETE','route' => ['article.destroy', $article->id],'style'=>'display:inline']) !!}
                        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
                {{ $articles->links() }}
    </div>

@stop