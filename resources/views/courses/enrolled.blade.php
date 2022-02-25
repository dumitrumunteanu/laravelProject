@if(sizeof($enrolledUsers) > 1)
    @foreach($enrolledUsers as $enrolledUser)
        @if($enrolledUser->id != Auth::user()->id)
            <div class="row row-cols-2 my-2">
                <div class="col-8">{{ $enrolledUser->email }}</div>
                <div class="col-4 text-center">
                    <form action="{{ route('course.unenrollUser', ['courseId' => $course->id, 'userId' => $enrolledUser->id]) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit">Remove</button>
                    </form>
                </div>
            </div>
        @endif
    @endforeach
@else
    <p class="text-muted text-center">No enrolled students yet</p>
@endif

