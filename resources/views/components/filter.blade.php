<div class="container my-3">
    <div class="row">
        <div class="col mb-3">
            @yield('button')
            <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownFilter" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-arrows-alt-v"></i> Order By
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownFilter">
                        <li><a class="dropdown-item" href="{{ (request()->author ? '?author=me&sort=title_asc' : '?sort=title_asc') . ('&page=' . (request()->page ?? '1') . (request()->text ? '&text=' . request()->text : '')) }}">Name (A - Z)</a></li>
                        <li><a class="dropdown-item" href="{{ (request()->author ? '?author=me&sort=title_desc' : '?sort=title_desc') . ('&page=' . (request()->page ?? '1') . (request()->text ? '&text=' . request()->text : '')) }}">Name (Z - A)</a></li>
                        <li><a class="dropdown-item" href="{{ (request()->author ? '?author=me&sort=date_desc' : '?sort=date_desc') . ('&page=' . (request()->page ?? '1') . (request()->text ? '&text=' . request()->text : '')) }}">Date (new - old)</a></li>
                        <li><a class="dropdown-item" href="{{ (request()->author ? '?author=me&sort=date_asc' : '?sort=date_asc') . ('&page=' . (request()->page ?? '1') . (request()->text ? '&text=' . request()->text : '')) }}">Date (old - new)</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 col-lg-3">
            <form id="search" name="search" method="GET">
                <div class="input-group">
                    <input value="{{ old('text') }}" name="text" type="search" class="form-control" placeholder="Search">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
