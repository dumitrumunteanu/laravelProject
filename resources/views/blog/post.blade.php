@extends('layouts.app')

@section('content')
    <div class="container mt-3 mb-4">
        <div class="card bg-dark text-white">
            <img src="{{ asset('storage/blog_img').'/'.$post->image }}" height="200px" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h1 class="card-title">{{ $post->title }}</h1>
                <p class="card-text">
                    Posted on: {{ date('d.m.Y', strtotime($post->published_at)) }}
                    <br>
                    Author: {{ $post->user()->get()->toArray()[0]['name'] }}
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <p>
            {{ $post->description }}
        </p>
    </div>

    <div class="container mt-5">
        <h4 class="h4">Comments</h4>
        <hr>

        @foreach($comments as $comment)
            @include('blog.comment_template')
        @endforeach

        <div class="my-2">
            <div class="row g-0">
                <div class="col-2 col-md-1 mt-3 text-center">
                    <img src="https://via.placeholder.com/150" width="75" height="75" class="img-fluid rounded-circle my-auto" alt="profile">
                </div>
                <div class="col-10 col-md-10">
                    <div class="card-body">
                        <textarea name="comment" id="comment" rows="2" placeholder="Add comment" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-1 mt-4 text-center">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </div>
        </div>
    </div>
@endsection
