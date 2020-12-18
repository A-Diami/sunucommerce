<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'ProduitController@index')->name('home');
Route::get('/produit_liste','ProduitController@liste')->name('produitliste');

Route::get('/panier','CartController@index')->name('cart.index');
Route::post('/panier/ajouter','CartController@store')->name('cart.store');
Route::get('/videPanier',function (){
    Cart::destroy();
});
Route::delete('/panier/{rowId}','CartController@destroy')->name('destroy');



Route::resource('produit','ProduitController');
Route::resource('categorie','CategorieController');
