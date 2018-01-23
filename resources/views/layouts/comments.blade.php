
@if(count($comments) > 0)
<div>
    @foreach($comments as $comment)
        <div style="border: dotted 1px; padding: 5px; margin: 5px; background-color: #f9f9f9">
            <b>{{$comment->user->name}}:</b>
            <div style="float: right;">

                {{ Form::open(['url' => 'vote']) }}
                @if(Auth::user())
                    @if($comment->plus)
                        <button name="plus" onClick="this.form.value.value=1;this.form.submit();">+</button>
                    @else
                        <button name="plus" disabled="disabled" style="color: lightgrey">+</button>
                    @endif

                    <b>{{ $comment->rating }}</b>

                    @if($comment->minus)
                        <button name="minus" onClick="this.form.value.value=-1;this.form.submit();">-</button>
                    @else
                        <button name="minus" disabled="disabled" style="color: lightgrey">-</button>
                    @endif
                @else
                    <button name="plus" onClick="alert('Зарегистрируйтесь, чтобы иметь возможность голосовать.');event.preventDefault();">+</button>
                    <b>{{ $comment->rating }}</b>
                    <button name="minus" onClick="alert('Зарегистрируйтесь, чтобы иметь возможность голосовать.');event.preventDefault();">-</button>
                @endif
                {{ Form::hidden('comment_id', $comment->id ) }}
                {{ Form::hidden('value', 0 ) }}
                {{ Form::close() }}

            </div>
            <p style="padding-left: 10px; background-color: white; width: 90%">{{$comment->message}}</p>
            <div style="padding-left: 30px">
                @include('layouts.comments', ['comments' => $comment->replys])
            </div>
            @if(Auth::user())
                <div class="btn btn-default" onclick="reply({{$comment->id}})" name="button{{$comment->id}}">Replay</div>
                <div class="hidden" name="form{{$comment->id}}">
                    @include('layouts.comment-form', ['reply_id' => $comment->id, 'article_id' => $article->id])
                </div>
            @endif
        </div>
    @endforeach
</div>
@endif
