@extends(Auth::check() ? 'layouts.app_logged_in' : 'layouts.app_logged_out')

@section('content')
    <div class="container">
        <h1 class="display-4 fw-bold">Contact Us</h1>
        <hr>
    </div>

    <div class="container">
        <form action="{{ route('contact.send') }}" method="POST" class="needs-validation pt-4" name="contact" novalidate>

            @csrf

            <div class="row">
                <div class="offset-lg-3 col-lg-3 offset-md-1 col-md-5 col-sm-6">
                    <div class="form-group mb-4">
                        <label for="firstName">First Name</label>
                        <input name="first-name" value="{{ old('first-name') }}" id="firstName" type="text" placeholder="John" class="form-control @error('first-name') is-invalid @enderror" required>
                        @error('first-name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6">
                    <div class="form-group mb-4">
                        <label for="lastName">Last Name</label>
                        <input name="last-name" value="{{ old('last-name') }}" id="lastName" type="text" placeholder="Doe" class="form-control @error('last-name') is-invalid @enderror" required>
                        @error('last-name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="offset-lg-3 col-lg-6 offset-md-1 col-md-10">
                    <div class="form-group mb-4">
                        <label for="email">Email address</label>
                        <input name="email" id="email" type="email" placeholder="name@example.com" value="{{ Auth::check() ? Auth::user()->email : old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="offset-lg-3 col-lg-6 offset-md-1 col-md-10">
                    <div class="form-group mb-4">
                        <label for="department">Department</label>
                        <select id="department" class="form-control @error('department') is-invalid @enderror" name="department">
                            <option value="">Choose which department you want to contact</option>
                            <option @if(old('department') === 'IT') selected @endif value="IT">IT</option>
                            <option @if(old('department') === 'hr') selected @endif value="hr">Human Resources</option>
                            <option @if(old('department') === 'marketing') selected @endif value="marketing">Marketing</option>
                            <option @if(old('department') === 'operations') selected @endif value="operations">Operations Department</option>
                            <option @if(old('department') === 'finance') selected @endif value="finance">Finance</option>
                        </select>
                        @error('department')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="offset-lg-3 col-lg-6 offset-md-1 col-md-10">
                    <div class="form-group mb-4">
                        <label for="messageArea">Message</label>
                        <textarea name="message" id="messageArea" class="form-control @error('message') is-invalid @enderror" rows="3" required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-center pb-4">
                <button type="submit" class="btn btn-success w-25">Send</button>
            </div>
        </form>
    </div>

    @include('components.toast')
@endsection
