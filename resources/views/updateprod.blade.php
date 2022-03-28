@extends("../components.skeleton")
@section('body')
        <div class="flex-center">     
            <div class="container">
                <div class="flex-center title m-b-md">
                    {{$title}}
                </div>

                <form action="/update" method="post" class="generic-form">
                    @csrf
                    @if (!empty($dataProd))
                        @foreach ($dataProd as $key => $products) 
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Categorie</label>
                                <div class="col-sm-10"> 
                                    <select name="namecategorie" id="nameCat" class="categorie js-example-basic-single custom-select form-control">
                                            @if (!empty($dataCat))
                                                @foreach ($dataCat as $key => $categorie)
                                                    <option value="{{ $categorie->idcat }}" data-type="{{ $categorie->idcat }}"
                                                        data-company-id="{{ $categorie->namecategory }}"
                                                        {{ $categorie->idcat == $products->fkidcat ? 'selected' : '' }}>
                                                        {{ $categorie->namecategory }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Name Product</label>
                                <div class="col-sm-10">
                                <input type="text" class="nameProduct form-control" name="nameproduct" value="{{$products->nameproduct}}">
                                </div> 
                            </div> 
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Description Product:</label>
                                <div class="col-sm-10"> 
                                <input type="text" class="descProd form-control" name="description" value="{{$products->description}}">
                                </div> 
                            </div> 
                            <div class="form-group row">
                                <div class="col-sm-10">
                                <input type="hidden" class="idProd" name="idproduct" value="{{$staticId}}">
                                <input type="hidden" class="fkCat" name="fkidcat" value="{{$products->fkidcat}}">
                                <input type="hidden" class="token"  name="csrf-token" content="{{csrf_token()}}">
                                <button type="submit" class="btnUpdate btn btn-primary" >Update <i class="fa-solid fa-location-arrow"></i></button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </form>

            </div>
 
        </div> 

    <script >
        // Control events 
        var selectCat = document.querySelector('.categorie');

        // Fields values 
        var fkIdCat = document.querySelector('.fkCat'); 
         
        // Event for asign new value input hidden
        selectCat.addEventListener('change', function(e){ 
            fkIdCat.value = selectCat.value; 
        });
    </script>
 
 @endsection