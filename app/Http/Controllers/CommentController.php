<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Idea;

class CommentController extends Controller
{
    public function store(Idea $idea){

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->idea_id = $idea->id;
        $comment->content = request('content');
        $comment->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Comment posted successfully');

    }
}
