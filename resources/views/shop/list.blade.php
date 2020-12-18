@extends('layouts.app')
@section('content')
    @if(session('success'))
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endif
    @include('template.header')

    <div align="center">
        <a href="{{ route('produit.create') }}" class="btn btn-success">Ajouter Un produit</a>
        <a href="{{ route('categorie.create') }}" class="btn btn-dark">Ajouter Une Categorie</a>
    </div>
    <br>
    <table class="table table-success table-striped" align="center" style="width: 800px">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Prix</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($produits as $produit)
            <tr>
                    <td>{{ $produit->id }}</td>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->description }}</td>
                    <td>{{ $produit->prix_ht }}</td>
                    <td>
                        <form action="{{ route('produit.destroy', $produit->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-dark"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
            </tr>
        @endforeach

    </table>

@endsection
