{!! Form::open(['method'=>'POST', 'url'=>'search', 'class'=>'typeahead navbar-form navbar-left',
 'role'=>'search']) !!}

<div class="form-group">
    {{Form::text('tag','', ['class' => 'typeahead form-control search-tag',
    'placeholder' => 'Поиск статей по тегу', 'autocomplete' => 'off', 'id' => 'search-by-tag'])}}
</div>
  {{Form::submit('Поиск', ['class' => 'btn btn-default'])}}

{!! Form::close() !!}
{{--<div class="container">
<input type="text" class="typeahead form-control">
</div>--}}

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/bootstrap-3-typeahead_4.0.1.js') }}"></script>

    <script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $("input.typeahead").typeahead({
        source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });

</script>

@endpush
