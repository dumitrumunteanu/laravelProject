<div class="my-2">
    <div class="row g-0">
        <div class="col-2 col-md-1 mt-3 text-center">
            <img src="https://via.placeholder.com/150" width="75" height="75" class="img-fluid rounded-circle my-auto" alt="profile">
        </div>
        <div class="col-10 col-md-11">
            <div class="card-body">
                <h6 class="card-title">{{ $comment->author_email}}</h6>
                <p class="card-text text-break">{{ $comment->message }}</p>
                <p class="card-text"><small class="text-muted">Posted: {{ date('d.m.Y', strtotime($comment->published_at)) }}</small></p>
            </div>
        </div>
    </div>
</div>
