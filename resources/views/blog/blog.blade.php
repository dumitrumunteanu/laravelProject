@extends(Auth::check() ? 'layouts.app_logged_in' : 'layouts.app_logged_out')

@section('content')
    <div class="container">
        <h1 class="display-4 fw-bold">Our Blog</h1>
        <hr>
    </div>

    @section('button')
        @if(Auth::check())
            <a href="{{ route('blog.new') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Post
            </a>

            <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownFilter" data-bs-toggle="dropdown" aria-expanded="false">
                        Show
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownFilter">
                        <li><a class="dropdown-item" href="?author=me">My Posts</a></li>
{{--                        <li><a class="dropdown-item" href="/blog">All Posts</a></li>--}}
                        <li><a class="dropdown-item" href="{{ (request()->sort ?? false) ? ('/blog?sort=' . request()->sort) : '/blog' }}">All Posts</a></li>
                    </ul>
                </div>
            </div>
            @endif
    @endsection
    @include('components.filter')


    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                @include('blog.blog_card_template')
            @endforeach
        <div>
    </div>

    <div class="row">
        {{ $posts->links() }}
    </div>

    @include('components.toast')

@endsection
