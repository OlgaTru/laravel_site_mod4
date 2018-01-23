<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        dump('hello');
        return 'HELLO';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->article_id = Input::get('article_id');
        $comment->message = Input::get('message');
        $comment->reply_id = Input::get('reply_id');
        $comment->user()->associate(Auth::user());
        $comment->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function vote(Request $request)
    {
        $value = Input::get('value');
        $comment_id = Input::get('comment_id');
        $user = Auth::user();

        $old_vote = Vote::where('comment_id', $comment_id)->where('user_id', $user->id)->first();

        if($old_vote) {
            $old_vote->value += $value;
            $old_vote->save();
        }
        else {
            $vote = new Vote;
            $vote->value = $value;
            $vote->comment()->associate($comment_id);
            $vote->user()->associate($user);
            $vote->save();
        }

        return back();
    }
}
