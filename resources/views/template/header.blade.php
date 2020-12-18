<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-red">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    @foreach(App\Categorie::all() as $category)
                    <a class="nav-link" href="{{ route('home',['categories' =>$category->slug]) }}" style="font-size: 20px;vertical-align: middle;display: table-cell;
     padding: 10px; ">{{ $category->nom }}</a>
                    @endforeach
                </li>

            </ul>
        </div>
    </nav>

</header>
