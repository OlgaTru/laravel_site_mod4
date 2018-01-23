
@if(Auth::user())
    {{ Form::open(array('url' => 'comments')) }}
    {{ Form::label('comment', 'Comment') }}
    {{ Form::text('message', '', array('placeholder' => 'Write your comment here...', 'style' => 'width: 300px')) }}
    {{ Form::submit('Submit comment') }}
    {{ Form::hidden('article_id', $article_id ) }}
    {{ Form::hidden('reply_id', $reply_id ) }}
    {{ Form::close() }}
@else
    <b><a href="{{ route('register') }}">Зарегистрируйтесь</a>, чтобы оставлять комментарии.</b>
@endif
