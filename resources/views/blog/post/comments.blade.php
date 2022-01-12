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
                <input type="email" id="email" class="form-control mb-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email">
                @error('email')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            @endif

            <textarea name="message" id="message" rows="2" placeholder="Add comment" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
            @error('message')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
    </div>
    <div class="col-2 col-md-1 text-center my-5">
        <button type="submit" class="btn btn-success">Add</button>
    </div>
</form>

@foreach($comments as $comment)
    @include('blog.post.comment_template')
@endforeach
