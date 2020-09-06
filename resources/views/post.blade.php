@extends('layouts.app')
@section('content')

<!-- Page Content -->
<div class="container">

    <div class="row">

<!-- Post Content Column -->

        <div class="col-lg-8">

<!-- Title -->

            <h1 class="mt-4">{{$post['title']}}</h1>

<!-- Author -->

            <p class="lead">
                by
                <a href="#">User ID {{$post['id']}}</a>
            </p>

            <hr>

<!-- Date/Time -->

            <p>Posted on January 1, 2019 at 12:00 PM</p>

            <hr>

<!-- Preview Image -->
            <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

            <hr>

<!-- Post Content -->
            <div class="card-body">
                <p class="lead">{{$post['text']}}</p>
            </div>
<!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    @if($post && $post->comments)
                        @foreach($post->comments as $comment)
                            <div class="card-body">
                                <div class="block1">
                                    <p class="card-text">USER: @if(Auth::check()) @if(!$comment->user_id) Anonymous @endif {{$comment->user_id}} @else Anonymous @endif </p>
                                    <hr>
                                    <p class="card-text">COMMENT:@if(Auth::check()) {{$comment->text}} @else Please login or register to see the comments @endif</p>
                                    <hr>
                                    <p class="glyphicon glyphicon-time">Date:@if(Auth::check()) {{$comment->published_at}} @else Please login or register to see the comments @endif</p>
                                </div>
                            </div>

                        @endforeach

                    @endif
                        <div class="footer">
                            <form name="FormComment" action="/posts/{{$post['id']}}/addComment" enctype="multipart/form-data" method="post" >
                                <input class="form-control" type="hidden" name="post_id" value="{{$post['id']}}" >
                                @csrf
                                <div>
                                    <textarea class="form-control textarea_comment" id="exampleFormControlTextarea1" name="text" required placeholder="Add your comment"></textarea>
                                </div>
                                <div>
                                    <br>
                                    <button value="Submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@stop
