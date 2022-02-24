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
                        <li><a class="dropdown-item" href="{{ (request()->sort ?? false) ? ('/blog?sort=' . request()->sort) : '/blog' }}">All Posts</a></li>
                    </ul>
                </div>
            </div>
            @endif
    @endsection
    @include('components.filter')

    <div class="container my-3">
        <div class="accordion shadow" id="mostPopular">
            <div class="accordion-item">
                <h2 class="accordion-header" id="title">
                    <button class="accordion-button collapsed fs-3 text-decoration-underline" type="button" data-bs-toggle="collapse" data-bs-target="#mostPopularList" aria-expanded="true" aria-controls="mostPopularList">
                        Most Popular Posts
                    </button>
                </h2>
                <div id="mostPopularList" class="accordion-collapse collapse" aria-labelledby="title" data-bs-parent="#mostPopular">
                    <div class="accordion-body">
                        <div class="row row-cols-1 row-cols-md-3 g-4" posts-list>
                            <template popular-post-template>
                                <div class="col">
                                    <a href="" class="text-decoration-none text-black" id="link">
                                        <div class="card h-100">
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="commentCount">
                                                <span class="visually-hidden">comments</span>
                                            </span>
                                            <img class="card-img-top" alt="image" id="image">
                                            <div class="card-body">
                                                <h5 class="card-title" id="title"></h5>
                                                <p class="card-text" id="description"></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <script src="{{ asset('js/blog/blog.js') }}"></script>
@endsection
