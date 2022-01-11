<form class="row g-0 my-2" id="addComment" name="addComment" method="POST" action="{{ route('comment.add', $post->id) }}">
    @csrf

    <div class="col-2 col-md-1 mt-3 text-center">
        <img src="https://via.placeholder.com/150" width="75" height="75" class="img-fluid rounded-circle my-auto" alt="profile">
    </div>

    <div class="col-8 col-md-10">
        <div class="card-body">
            @if(Auth::check())
                <h6 class="card-title">{{ Auth::user()->email }}</h6>
            @else
                <input id="email" type="email" class="form-control mb-2" name="email" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email">
            @endif
            <textarea name="message" id="message" rows="2" placeholder="Add comment" class="form-control" required></textarea>
        </div>
    </div>
    <div class="col-2 col-md-1 text-center my-5">
        <button type="submit" class="btn btn-success">Add</button>
    </div>
</form>

@foreach($comments as $comment)
    @include('blog.post.comment_template')
@endforeach
