<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }


}
