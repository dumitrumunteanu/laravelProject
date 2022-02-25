@if(sizeof($enrolledUsers))
    @foreach($enrolledUsers as $enrolledUser)
        <div class="row row-cols-2">
            <div class="col-8 my-3">{{ $enrolledUser->email }}</div>
            <div class="col-4 text-center">
                @if($enrolledUser->id !== Auth::user()->id)
                    <form action="{{ route('course.unenrollUser', ['courseId' => $course->id, 'userId' => $enrolledUser->id]) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit">Remove</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
@else
    <p class="text-muted text-center">No enrolled students yet</p>
@endif

