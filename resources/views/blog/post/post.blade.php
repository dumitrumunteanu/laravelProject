@extends(Auth::check() ? 'layouts.app_logged_in' : 'layouts.app_logged_out')

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

        @include('blog.post.comments')
    </div>
@endsection
