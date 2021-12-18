@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4 fw-bold">Our Blog</h1>
        <hr>
    </div>

    <div class="container my-3">
        <div class="row">
            <div class="col mb-3">
                <div class="dropdown justify-content-start">
                    @if(Auth::check())
                        <a href="{{ route('blog.new') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> New Post
                        </a>
                    @endif
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownFilter" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-arrows-alt-v"></i> Order By
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownFilter">
                        <li><a class="dropdown-item" href="#">Name (A - Z)</a></li>
                        <li><a class="dropdown-item" href="#">Name (Z - A)</a></li>
                        <li><a class="dropdown-item" href="#">Date (new - old)</a></li>
                        <li><a class="dropdown-item" href="#">Date (old - new)</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-3">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search">
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
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
@endsection
