<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Post\StorePost;
use App\Services\PostServices;




class PostController extends Controller
{


    private $PostServices;

    public function __construct(PostServices $PostServices)
    {
        return $this->PostServices = $PostServices;
    }

    public function index(Request $request): View
    {
        return view('posts', ['posts' => $this->PostServices->getPosts($request->user())]);
    }

    public function create()
    {


    }

    public function store(StorePost $request)
    {
        $this->PostServices->createPost(
            $request->validated(),
            $request->user(),
            $request
        );

        return redirect()->route('posts');
    }

    public function show($id): View
    {
        return view('post', ['post' => Post::findOrFail($id)]);

    }
    public function edit(Post $post)
    {


    }


    public function update(Request $request, Post $post)
    {


    }


    public function destroy(Post $post)
    {


    }
}
