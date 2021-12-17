@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4 fw-bold mt-3">Add Post</h1>
        <hr>
    </div>

    <div class="container">
        <form id="createEvent">
            <div class="row mb-3">
                <label for="postTitle" class="col-2 col-form-label">Title</label>
                <div class="col-10">
                    <input id="postTitle" name="postTitle" placeholder="Set post title" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label for="postBg" class="col-2 col-form-label">Wallpaper</label>
                <div class="col-10">
                    <input id="postBg" name="postBg" type="file"  accept="image/*" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label for="postContent" class="col-2 col-form-label">Content</label>
                <div class="col-10">
                    <textarea name="postContent" id="postContent" rows="3" placeholder="Post content" class="form-control"></textarea>
                </div>
            </div>

            <div class="text-center pb-4">
                <button type="submit" class="btn btn-success">Post</button>
            </div>
        </form>
    </div>
@endsection
