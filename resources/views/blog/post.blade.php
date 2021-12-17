@extends('layouts.app')

@section('content')
    <div class="container mt-3 mb-4">
        <div class="card bg-dark text-white">
            <img src="https://via.placeholder.com/728x150" height="150px" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h1 class="card-title">Post Title</h1>
                <p class="card-text">Posted on: 02.02.2020</p>
            </div>
        </div>
    </div>

    <div class="container">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum eaque, voluptatibus corporis doloribus sapiente dolore neque, aut modi impedit veniam voluptates sequi perferendis voluptas debitis dolorem. Excepturi odio debitis fuga.
        </p>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus repudiandae, doloribus hic adipisci voluptatum similique illo laudantium praesentium tempora nesciunt dolorem odio? Laudantium, sunt incidunt? Modi nemo inventore et dolor a. Ducimus nemo eum ipsam sed facilis nobis culpa, placeat vitae earum excepturi officiis? Hic aspernatur eum id labore illo voluptatum, perspiciatis nisi magnam suscipit dolore ex, facilis mollitia veniam. Aperiam dicta cum incidunt corrupti ratione doloribus? Non, inventore ipsum rem perspiciatis soluta magnam veniam repellat vel. A quos iste animi incidunt excepturi dolor alias ea id repellat possimus provident explicabo inventore natus iusto asperiores, accusantium atque eos debitis cumque.
        </p>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam minima modi accusantium dolorum, enim consequuntur mollitia officiis laboriosam voluptas! Repellat odit ullam soluta, perspiciatis iure pariatur incidunt quia harum velit nihil enim tempore ipsa cupiditate sit magnam ratione tenetur qui, dolorum doloribus quidem? Et repellendus, animi, qui quibusdam ad excepturi modi eius quisquam id rerum odit! Voluptas beatae minima ea unde! Sunt, enim neque necessitatibus distinctio, molestiae earum officiis natus quia fugiat impedit delectus totam.
        </p>

        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem, nostrum. A non recusandae, corrupti quibusdam aut eum cumque sit alias.
        </p>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti ullam ipsa illo accusamus tempora, rerum ea esse facilis omnis saepe incidunt quia iusto repellendus nemo eveniet quaerat aspernatur ipsam sapiente.
        </p>
    </div>

    <div class="container mt-5">
        <h4 class="h4">Comments</h4>
        <hr>

        <div class="my-2">
            <div class="row g-0">
                <div class="col-2 col-md-1 mt-3 text-center">
                    <img src="https://via.placeholder.com/150" width="75" height="75" class="img-fluid rounded-circle my-auto" alt="profile">
                </div>
                <div class="col-10 col-md-11">
                    <div class="card-body">
                        <h6 class="card-title">Firstname Lastname</h6>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque laborum ducimus blanditiis quidem alias quas tenetur deserunt officia quos minima!</p>
                        <p class="card-text"><small class="text-muted">Posted: 03.02.2020</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-2">
            <div class="row g-0">
                <div class="col-2 col-md-1 mt-3 text-center">
                    <img src="https://via.placeholder.com/150" width="75" height="75" class="img-fluid rounded-circle my-auto" alt="profile">
                </div>
                <div class="col-10 col-md-11">
                    <div class="card-body">
                        <h6 class="card-title">Firstname Lastname</h6>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque laborum ducimus blanditiis quidem alias quas tenetur deserunt officia quos minima!</p>
                        <p class="card-text"><small class="text-muted">Posted: 03.02.2020</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-2">
            <div class="row g-0">
                <div class="col-2 col-md-1 mt-3 text-center">
                    <img src="https://via.placeholder.com/150" width="75" height="75" class="img-fluid rounded-circle my-auto" alt="profile">
                </div>
                <div class="col-10 col-md-10">
                    <div class="card-body">
                        <textarea name="comment" id="comment" rows="2" placeholder="Add comment" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-1 mt-4 text-center">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </div>
        </div>
    </div>
@endsection
