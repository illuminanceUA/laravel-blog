@extends('layouts.app')
@section('content')

    <title>Blog Home - Start Bootstrap Template</title>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Laravel Blog
                <small>Welcome!!!</small>
            </h1>

            <!-- Blog Post -->
            @foreach($posts as $post)
            <div class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">Post Title</h2>
                    <p class="card-text">{{$post->text}}</p>
                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on January 1, 2020 by
                    <a href="#">Start Bootstrap</a>
                    <img class="card-img-top" src="/public/hr.png" alt="image">
                </div>
            </div>
            @endforeach

        <!-- Paginate -->
    <div class="pagination justify-content-center mb-4">
        {{$posts->links()}}
    </div>


      <!-- Create new post -->

            <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">New post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add-post') }}" enctype="multipart/form-data" method="post" >
                        @csrf
                        <div>
                            <label for="exampleFormControlTextarea1">Please, add your post</label>
                            <input class="form-control" id="exampleFormControlTextarea1" name="text">
                        </div>
                        <div>
                            <label for="exampleFormControlFile1">You can load your image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary submitpost">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@stop

