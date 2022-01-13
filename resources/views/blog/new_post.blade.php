@extends('layouts.app_logged_in')

@section('content')
    <div class="container mt-3">
        <h1 class="display-4 fw-bold">Add Post</h1>
        <hr>
    </div>

    <div class="container">
        <form id="createPost" name="createPost" method="POST" action="{{ route('post.submit') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <label for="title" class="col-2 col-form-label">Title</label>
                <div class="col-10">
                    <input value="{{ old('title') }}" id="title" name="title" placeholder="Set post title" class="form-control @error('title') is-invalid @enderror" required>
                    @error('title')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="image" class="col-2 col-form-label">Wallpaper</label>
                <div class="col-10">
                    <input id="image" name="image" type="file"  accept="image/*" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-2 col-form-label">Content</label>
                <div class="col-10">
                    <textarea name="description" id="description" rows="20" placeholder="Post content" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>

            <div class="col-10 offset-2 text-center mb-4">
                <button type="submit" class="btn btn-success">Post</button>
            </div>
        </form>
    </div>
@endsection
