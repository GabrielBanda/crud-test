<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $guarded  = [
        'status',
        'created_at',
        'updated_at'
    ];
     
    // Get all data products
    public static function getProducts(){
        $listProducts  = Producto::select('productos.*')->where('status',1)->get();
        return $listProducts;
    }

    // Get Specifict dataProduct by id
    public static function getProductById($param){
        $product = Producto::select('productos.*')->whereRaw('md5(idproduct) = "' . $param . '"')->get();
        return $product;
    }

    // Update product 
    public static function updateProduct($params = []){

        $id     = isset($params['idproduct'])     ? $params['idproduct']     : null;
        $name   = isset($params['nameproduct'])   ? $params['nameproduct']   : null;
        $descr  = isset($params['description'])   ? $params['description']   : null;
        $fk     = isset($params['fkidcat'])       ? $params['fkidcat']   : null;
        
        $prodUpdt = Producto::whereRaw('md5(idproduct) = "' . $id . '"')->update(['nameproduct' => $name,'description' => $descr, 'fkidcat'=> $fk]);
        $res = '';
        if($prodUpdt == true){
            $res = $prodUpdt;
        }else{
            $res = $prodUpdt;
        }
        return $prodUpdt;
    }

    // Delete Product
    public static function deleteProd($params = []){

        $id     = isset($params['idproduct'])     ? $params['idproduct'] : null;
        
        $prodUpdt = Producto::whereRaw('md5(idproduct) = "' . $id . '"')->update(['status' => 0]);
        $res = '';
        if($prodUpdt == true){
            $res = $prodUpdt;
        }else{
            $res = $prodUpdt;
        }
        return $prodUpdt;
    } 



}
