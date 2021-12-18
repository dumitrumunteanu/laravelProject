<div class="col-sm-6">
    <div class="card my-3">
        <div class="card-body">
            <h5 class="card-title text-uppercase">{{ $post->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted fw-light">Posted on {{ date('d.m.Y', strtotime($post->published_at)) }}</h6>
            <p class="card-text text-truncate">{{ $post->excerpt }}</p>
            <a href="{{ route('blog.show').'/'.$post->id }}" class="card-link float-end text-decoration-none">Read more</a>
        </div>
    </div>
</div>
