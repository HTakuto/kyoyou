<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|max:255',
            'article_id' => 'required|exists:articles,id',
        ]);

        $comment = new Comment;
        $comment->content = $validatedData['content'];
        $comment->user_id = Auth::user()->id;
        $comment->article_id = $validatedData['article_id'];
        $comment->save();

        return redirect()->back();
    }
}
