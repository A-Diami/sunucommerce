<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $produits = DB::select("Select * from produits inner join categories where produits.categorie_id = categories.id");
        if (request()->categories)
        {
            $produits = Produit::with('categorie')->whereHas('categorie',function ($query){
                $query->where('slug',request()->categories);
            });
        }else{
            $produits = Produit::with('categorie')->get();
        }

        //dd($cate);
        return view('shop.index',compact('produits'));
    }
    public function liste()
    {
        $produits = Produit::all();
        return view('shop.list',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('shop.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produit = new Produit();
        $produit->nom = $request->name;
        $produit->description = $request->description;
        $produit->prix_ht= $request->prix;
        $produit->categorie_id = $request->categorie_id;

        if (request()->hasFile('photo')){
            $uploadedImage = $request->file('photo');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $uploadedImage->move($destinationPath, $imageName);
            $uploadedImage->imagePath = $destinationPath . $imageName;

        }
        $produit->photo = $imageName;


        $produit->save();
        return $this->liste();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = Produit::find($id);

        if ($produit != null) {
            $produit->delete();

        }

        return back()->with('success', 'le produit a ete supprime');
    }
}
