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
                    <h2 class="card-title">{{$post['title']}}</h2>
                    <p class="card-text">{{$post['text']}}</p>
                    <a href="posts/{{$post['id']}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    <img class="card-img-top" src="/public/hr.png" alt="image">
                    Posted by User
                    <a href="#">{{$post['user_id']}}</a>
                    <span style='padding-left:350px;'> </span><span class="glyphicon glyphicon-time"></span> Posted on {{ $post['published_at']}}
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

                        <form action="{{ route('/posts/add') }}" enctype="multipart/form-data" method="post" >
                            @csrf

                            <div class="form-group">
                                <label for="title">Title <span class="require">*</span></label>
                                <input type="text" class="form-control" name="title" required placeholder="Minimum 5 symbols" minlength="5" maxlength="25" />

                            </div>

                            <div>
                                <h5>Text</h5>
                                <textarea class="form-control textarea_post" id="exampleFormControlTextarea1" name="text" required placeholder="Minimum 26 symbols" minlength="26" maxlength="2048"></textarea>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image">Featured Image <span class="required">*</span></label>
                                    <input class="form-control-file" type="file" name="image" id="exampleFormControlFile1">

                                </div>

                                <div>
                                    <button value="Upload" type="submit" name="upload" class="btn btn-primary submit">Submit</button>

                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>

@stop

