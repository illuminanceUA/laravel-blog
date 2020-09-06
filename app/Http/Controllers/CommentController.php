<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\CommentServices;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Comment\StoreComment;

class CommentController extends Controller
{

    private $CommentServices;

    public function __construct(CommentServices $CommentServices)
    {
        return $this->CommentServices = $CommentServices;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        return view('posts/{id}', ['comments' => $this->CommentServices->getComments()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request)
    {
        $this->CommentServices->createComment(
            $request->validated(),
            $post = Post::find($request->get('post_id'))
        );

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
