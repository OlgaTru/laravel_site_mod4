@extends('admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-block btn-default" href="{{ route('article.index') }}">Создать/редактировать статью</a>
        </div>

    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-block btn-default" href="#">Создать/редактировать категорию</a>

        </div>



    </div>

</div>
@stop