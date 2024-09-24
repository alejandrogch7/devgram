<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(Request $request, User $user, Post $post)
    {
        // validate 
        $this->validate($request, [
            'comment' => 'required|max:255'
        ]);
        // store the output
        Comment::create([
            'user_id'=> Auth::user()->id,
            'post_id'=> $post->id,
            'comment'=>$request->comment
        ]);
        // send a confirmation 
        return back()->with('message', 'successfully commented');
    }
}
