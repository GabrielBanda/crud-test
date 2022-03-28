<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //

    // Get all data categories
    public static function getCategories(){
        $listCat  = Categories::select('categories.*')->get();
        return $listCat;
    }

     // Get Specifict categorie by id
     public static function getCategorieById($param){
        $categorie = Categories::select('categories.*')->whereRaw('md5(idcat) = "' . $param . '"')->get();
        return $categorie;
    }


}
