@extends("../components.skeleton")
@section('body')
        <div class="flex-center">     
            <div class="container">
                <div class="flex-center title m-b-md">
                    {{$title}}
                </div>     
              
                <form action="/insert-product" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Categorie</label>
                        <div class="col-sm-10">
                            <select name="fkidcat" id="nameCat" class="categorie js-example-basic-single custom-select form-control" name="state">
                                <option value=""></option>
                                @if (!empty($dataCat))
                                    @foreach ($dataCat as $key => $categorie)
                                        <option value="{{ $categorie->idcat }}" data-type="{{ $categorie->idcat }}"> {{$categorie->namecategory}} </option>
                                    @endforeach
                                @endif
                            </select> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Name Product</label>
                        <div class="col-sm-10">
                        <input type="text" class="nameProduct form-control" name="nameproduct" value="">
                        </div> 
                    </div> 
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Description Product:</label>
                        <div class="col-sm-10"> 
                        <input type="text" class="descProd form-control" name="description" value="">
                        </div> 
                    </div> 
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <input type="hidden" class="token"  name="csrf-token" content="{{csrf_token()}}">
                        <button type="submit" class="btnUpdate btn btn-primary" >Send <i class="fa-solid fa-location-arrow"></i></button>
                        </div>
                    </div>
                </form>
            </div>
 
        </div>  
 
 @endsection