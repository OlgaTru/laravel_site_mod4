    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title text-center">Подпишитесь на рассылку!</h3>
                </div>
                <div class="modal-body">

                    @if (\Session::has('success'))

                        <div class="alert alert-success text-center" style="font-size: medium">
                            {!! \Session::get('success') !!}
                        </div>

                    @else

                    {!! Form::open(['url'=>'offer']) !!}

                        <div class="form-group">
                            {{Form::label('firstName', 'Имя')}}
                            {{Form::text('firstName','', ['class' => 'form-control', 'placeholder' => 'Имя',
                            'required'])}}
                        </div>


                        <div class="form-group">
                            {{Form::label('lastName', 'Фамилия')}}
                            {{Form::text('lastName','', ['class' => 'form-control', 'placeholder' => 'Фамилия',
                            'required'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('email', 'Email')}}
                            {{Form::email('email','', ['class' => 'form-control', 'placeholder' => 'Email',
                            'required'])}}
                        </div>

                        {{Form::submit('Подписаться', ['class' => 'btn btn-danger btn-lg center-block'])}}

                    {!! Form::close() !!}

                    @endif

                </div><!-- /.modal-body -->
           </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

{{--    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Launch demo modal
    </button>--}}


@if (\Session::has('success'))

    <script>
            $('#myModal').modal('show');
    </script>

@endif

<script>

    @if($deltaTime >= 0)
            setTimeout(function(){ $('#myModal').modal('show'); }, {{$deltaTime * 1000}});
    @endif

</script>



