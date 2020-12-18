@extends('layouts.app')

@section('content')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    @include('template.header')
    <main>
        <section class="py-5 text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Commandez  votre <br><span class="badge badge-light">nouvel</span> <br>Produit <span class="badge badge-primary ">préférée </span>!</h1>
                <p class="lead text-muted">Dénichez La collection de votre choix.</p>

            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                {{-- dump($produits) --}}
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($produits as $produit)

                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="{{ asset('images/'.$produit->photo)  }}" width="100%" height="350">

                                <div class="card-body">
                                    <p class="card-text">{{ $produit->nom }}
                                        <br>
                                        {{ $produit->description }}
                                        <br><br>
                                        <span class="badge badge-success">{{ $produit->categorie->nom }}</span>

                                    </p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="price">{{ $produit->prix_ht }} CFA</span>
                                        <form action="{{route('cart.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="produit_id" value="{{$produit->id}}" >
                                            <button type="submit" class="btn btn-dark">Ajouter au panier</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-right">
                <a href="#">Retour au sommet</a>
            </p>
            <p>HLM.COM</p>
        </div>

    </footer>
@endsection
