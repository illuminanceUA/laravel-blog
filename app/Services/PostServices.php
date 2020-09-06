<?php
namespace App\Services;


use App\Models\Post;
use App\User;
use App\Models\Comment;
use App\Http\Requests\Post\StorePost;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostServices {

    public function createPost(array $data, User $user): Post
    {
        $post = new Post();
        $post->title = Arr::get($data, 'title');
        $post->text = Arr::get($data, 'text');
        $post->user_id = $user->id;
       // $path = $request->file('image')->store('uploads', 'public');
        //$post->image = $path;
        $post->published_at;
        $post->save();
        return $post;
    }
    public function getPosts(?User $user = null)
    {
        $posts = Post::withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->paginate(5);
        return $posts;
    }



}

