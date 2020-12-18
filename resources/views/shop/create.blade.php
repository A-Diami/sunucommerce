@extends('layouts.app')
@section('content')
    @include('template.header')
    <main class="container">
        <div class="bg-dark p-5 rounded mt-3" style="color: white">
            <h1>Ajouter un produit</h1>
            <form method="post" action="{{ route('produit.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" placeholder="Nom" name="name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control"  name="description" id="description" placeholder="Description">
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number" class="form-control" name="prix" id="prix" placeholder="Prix">
                </div>
                <div class="mb-3">
                    <label for="categorie" class="form-label">Categorie</label>
                    <select name="categorie_id">
                        <option value="0">Entrer votre choix</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Image</label>
                    <input type="file" id="photo" placeholder="Image" name="photo">
                </div>
                <div>
                    <button class="btn btn-success">Envoyer</button>
                </div>
            </form>
        </div>
        <br>
        <a href="{{ route('produitliste') }}"><b style="font-size: 25px">Retour</b></a>

    </main>
@endsection()
