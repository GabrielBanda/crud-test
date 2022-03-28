<?php

namespace App\Http\Controllers;

 
use Illuminate\Http\Request;
  
use App\Models\Producto;
use App\Models\Categories;

class ProductosController extends Controller
{

    // Return view Index
    public function index(){
        $data['title'] = 'Test of Programmation';
        $data['breadUrl'] = '/';
        $data['breadTitle'] = 'Products';
        $data['prodInfo'] = Producto::getProducts(); 
        $data['catInfo'] = Categories::getCategories();
        return view('listprod', $data);
    }

    public function create(){
        $data['title'] = 'Insert some product';
        $data['breadUrlCreate'] = '/create-product';
        $data['breadTitleCreate'] = 'Add Products';
        $data['dataCat'] = Categories::getCategories();
        return view('insertprod', $data);
    }

    public function insertData(Request $request){

        // Validations fields
        $this->validate(
            $request,[
                'nameproduct'=>'required',
                'description'=>'required',
                'fkidcat'=>'required'
            ]);

        $producto=new Producto;
        $producto->fkidcat=$request->fkidcat;
        $producto->nameproduct=$request->nameproduct;
        $producto->description=$request->description;
        $producto->status=1;
        $producto->save();
        return redirect("/")->with('success', 'The Product now are in stock');
    }

    // Return view show producto
    public function showProduct($idProd){
        $data['title'] = 'View Update Product';
        $data['staticId'] = $idProd;
        $data['breadUrlShow'] = "/show-prod/".$idProd;
        $data['breadTitleShow'] = 'Update Product';
        $data['dataProd'] = Producto::getProductById($idProd);
        $data['dataCat'] = Categories::getCategories();
        return view('updateprod',$data);
    }
 

    // Method for update data
    public function update(Request $request)
    { 
        // print_r($request->input());
        // Validations fields
        $this->validate(
            $request,[
                'nameproduct'=>'required',
                'description'=>'required',
                'fkidcat'=>'required'
            ]);
        $updt =  Producto::updateProduct($request->input());
        // var_dump($request->input());
        if($updt){
            // return back()->with('success', 'The product are update, successful'); 
            return redirect("/")->with('success', 'The product are update, successful');
        }else{
            // return back()->with('success', 'Ups!!! Ocurred an error, contact support'); 
            return redirect("/")->with('success', 'Ups!!! Ocurred an error, contact support');
        }
    }

    public function delete(Request $request)
    { 
        // print_r($request->input());
        // exit;
        $dlt =  Producto::deleteProd($request->input());
        if($dlt){
            return response()->json(['data' => 'The product are delete, successful']);
        }else{
            return response()->json(['data' => 'Ups!!! Ocurred an error, contact support']);
        }
    }



}
