@extends('layouts.app_logged_in')

@section('content')
    <div class="container">
        <h1 class="display-4 fw-bold">Settings</h1>
        <hr>
    </div>

    <div class="container">
        <div class="row row-cols-2">
            <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                <h6 class="h6">Profile Picture</h6>
                <img src="https://via.placeholder.com/150" alt="profile picture" width="150px" height="150px" class="rounded-circle">
            </div>

            <form id="profileImage" name="profileImage" class="mt-md-4" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10 mt-4">
                        <label for="image">Image</label>
                        <input id="image" name="image" type="file"  accept="image/*" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-2 text-center mt-3 mt-md-5">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
