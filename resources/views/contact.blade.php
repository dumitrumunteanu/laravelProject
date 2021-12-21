@extends(Auth::check() ? 'layouts.app_logged_in' : 'layouts.app_logged_out')

@section('content')
    <div class="container">
        <h1 class="display-4 fw-bold">Contact Us</h1>
        <hr>
    </div>

    <div class="container">
        <form class="needs-validation pt-4" novalidate>
            <div class="row">
                <div class="offset-lg-3 col-lg-3 offset-md-1 col-md-5 col-sm-6">
                    <div class="form-group mb-4">
                        <label for="firstName">First Name</label>
                        <input id="firstName" type="text" placeholder="John" class="form-control" required>
                        <div class="invalid-feedback">
                            Invalid first name!
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6">
                    <div class="form-group mb-4">
                        <label for="lastName">Last Name</label>
                        <input id="lastName" type="text" placeholder="Doe" class="form-control" required>
                        <div class="invalid-feedback">
                            Invalid last name!
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="offset-lg-3 col-lg-6 offset-md-1 col-md-10">
                    <div class="form-group mb-4">
                        <label for="email">Email address</label>
                        <input id="email" type="email" placeholder="name@example.com" class="form-control" required>
                        <div class="invalid-feedback">
                            Invalid email!
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="offset-lg-3 col-lg-6 offset-md-1 col-md-10">
                    <div class="form-group mb-4">
                        <label for="messageArea">Message</label>
                        <textarea id="messageArea" class="form-control" rows="3" required></textarea>
                        <div class="invalid-feedback">
                            Invalid mesasge!
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center pb-4">
                <button type="submit" class="btn btn-success w-25">Send</button>
            </div>
        </form>
    </div>
@endsection
