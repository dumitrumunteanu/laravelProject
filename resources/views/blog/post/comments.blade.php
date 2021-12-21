@foreach($comments as $comment)
    @include('blog.post.comment_template')
@endforeach

<div class="my-2">
    <div class="row g-0">
        <div class="col-2 col-md-1 mt-3 text-center">
            <img src="https://via.placeholder.com/150" width="75" height="75" class="img-fluid rounded-circle my-auto" alt="profile">
        </div>
        <div class="col-10 col-md-10">
            <div class="card-body">
                <input id="email" type="email" class="form-control mb-2" name="email" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email">
                <textarea name="comment" id="comment" rows="2" placeholder="Add comment" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-1 mt-4 text-center">
            <button type="submit" class="btn btn-success">Add</button>
        </div>
    </div>
</div>
