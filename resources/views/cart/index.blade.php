@extends('layouts.app')
@section('content')

    <main role="main">
        @if(Cart::count() > 0)
            <section class="py-5">
                <div class="container">
                    <h1 class="jumbotron-heading"> <span class="badge badge-primary ">Votre panier </span></h1>
                    <table class="table table-bordered table-responsive-sm">
                        <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Qte</th>
                            <th>P.U</th>
                            <th>Total TTC</th>
                            <th>Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Cart::content() as $produit)
                            <tr>
                                <td>
                                    <img width="110" class="rounded-circle img-thumbnail" src="{{ asset('images/'.$produit->options['photo']) }}" alt="" style="height: 150px">
                                    {{ $produit->nom }}
                                </td>
                                <td>
                                   1
                                </td>
                                <td>
                                    {{number_format($produit->prix_ht ) }} CFA
                                </td>
                                <td>

                                </td>
                                <td>
                                    <form action="{{ route('destroy',$produit->rowId) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-dark"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td>Sous Total</td>
                            <td colspan="2" style="text-align: center">{{( Cart::subtotal() )}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td>TAX</td>
                            <td colspan="2" style="text-align: center">{{ Cart::tax() }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td>Total</td>
                            <td colspan="2" style="text-align: center">{{Cart::total()}}</td>
                        </tr>
                        </tfoot>
                    </table>
                    <a class="btn btn-block btn-outline-dark" href="">Commander</a>
                </div>
            </section>


    </main>
    @else
        <div class="col-md-12">
            <p>Votre panier est vide</p>
        </div>

    @endif

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-right">
                <a href="#">Retour au sommet</a>
            </p>
            <p>HLM.COM</p>
        </div>

    </footer>

@endsection
