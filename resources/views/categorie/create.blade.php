@extends('layouts.app')
@section('content')
    @include('template.header')
    <main class="container">
        <div class="bg-dark p-5 rounded mt-3" style="color: white">
            <h1>Ajouter une categorie</h1>
            <form method="post" action="{{ route('categorie.store') }}">
                @csrf

                <div class="form-group mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" placeholder="Nom" name="name">
                </div>
                <div class="form-group mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug">
                </div>

                <div>
                    <button class="btn btn-success">Envoyer</button>
                </div>
            </form>
        </div>
        <br>
        <a href="{{ route('produitliste') }}"><b style="font-size: 25px">Retour</b></a>
    </main>
@endsection
