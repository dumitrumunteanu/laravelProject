@extends('layouts.app_logged_in')

@section('content')
    <div class="container mt-3">
        <h1 class="display-4 fw-bold">Add Post</h1>
        <hr>
    </div>

    <div class="container">
        <form id="createPost" name="createPost" method="POST" action="{{ route('post.submit') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row mb-3">
                <label for="title" class="col-2 col-form-label">Title</label>
                <div class="col-10">
                    <input id="title" name="title" placeholder="Set post title" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="image" class="col-2 col-form-label">Wallpaper</label>
                <div class="col-10">
                    <input id="image" name="image" type="file"  accept="image/*" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-2 col-form-label">Content</label>
                <div class="col-10">
                    <textarea name="description" id="description" rows="20" placeholder="Post content" class="form-control" required></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label for="excerpt" class="col-2 col-form-label"> Summary</label>
                <div class="col-10">
                    <textarea name="excerpt" id="excerpt" rows="3" placeholder="Short summary" class="form-control" required></textarea>
                </div>
            </div>

            <div class="col-10 offset-2 text-center mb-4">
                <button type="submit" class="btn btn-success">Post</button>
            </div>
        </form>
    </div>
@endsection
