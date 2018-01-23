@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="form-group">
    <strong>Название статьи:</strong>
    {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
</div>

<div class="form-group">
    <strong>Категория:</strong>
    {!! Form::select('category_id', $categories_list, null , array('placeholder' => 'Категория','class' => 'form-control', 'id'=>'sel1' )) !!}
</div>

<div class="form-group">
    <strong>Содержит категорию "Аналитика":</strong>
    <label for="radio1">Да</label>
    {!! Form::radio('analytics', 1, ['id' => 'radio1']) !!}
    <label for="radio2">Нет</label>
    {!! Form::radio('analytics', 0, ['id' => 'radio2']) !!}


</div>

<div class="form-group">
    <strong>Теги:</strong>
    {!! Form::text('keywords', null , array('placeholder' => 'Теги','class' => 'form-control')) !!}
</div>

<div class="form-group">
    <strong>Краткое описание:</strong>
    {!! Form::textarea('description', null, array('placeholder' => 'Content','class' => 'form-control','style'=>'height:100px')) !!}
</div>

<div class="form-group">
    <strong>Содержание:</strong>
    {!! Form::textarea('content', null, array('placeholder' => 'Content','class' => 'form-control','style'=>'height:400px')) !!}
</div>

<div style="text-align: center">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
</div>

