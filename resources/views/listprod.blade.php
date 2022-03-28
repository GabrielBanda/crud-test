@extends("../components.skeleton")
@section('body')
        <div class="flex-center position-ref">     
            <div class="content">
                <div class="title m-b-md">
                    {{$title}}
                </div>  
                @if(Session('success'))
                <!-- <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert">x</a>
                    <strong> {{ Session('success')}}</strong>
                </div> -->
                <div class="alert alert-success alert-block fade show" role="alert" id="lessData">
                    <button type="button" class="close">×</button>    
                    <strong>{{ Session('success')}}</strong>
                </div>
                @endif
                
                <div>
                    <a href="create-product" class="btn btn-success">Agregar <i class="fa-solid fa-plus"></i></a>
                </div>

                <div class="datatable-content">
                    <table id="dt-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Categorie</th>
                                <th>Controls</th> 
                            </tr>
                        </thead>
                        <tbody>
                   
                        @if (!empty($prodInfo))
                            @foreach ($prodInfo as $key => $products) 
                            <tr>
                                <td></td>
                                <td>{{$products->nameproduct}} </td>
                                <td>{{$products->description}} </td>
                                @if(!empty($catInfo))
                                    @foreach($catInfo as $ky => $categories)
                                    @if($categories->idcat == $products->fkidcat)
                                        <td>{{ $categories->namecategory }}</td>
                                    @endif
                                    @endforeach
                                @endif 
                                <td>
                                    <a href="show-prod/{{MD5($products->idproduct)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <!-- considerar fetch para eliminar por id -->
                                    <a href="" data-id="{{MD5($products->idproduct)}}" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a> 
                                </td> 
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <input type="hidden" class="token"  name="csrf-token" content="{{csrf_token()}}">
                    <div class="footer-tools"></div>

                </div>
                 
            </div> 
        </div>

        <script>

                
         
            // Control events 
            var deleteBtn = document.querySelectorAll('.delete');
            var closeBtn = document.querySelector('.close');

            // Close div message
            
            if(closeBtn){
                closeBtn.addEventListener('click', function(e){
                    e.preventDefault();
                    let idClas = document.getElementById('lessData');
                    idClas.classList.remove("show");
                });
            }

            // Reading each buttons into of the table
            deleteBtn.forEach(btnDrop => {
                btnDrop.addEventListener('click', function(e){ 
                    e.preventDefault();
                    // fkIdCat.value = selectCat.value; 
                    // frm = new FormData();
                    let attrBtn = btnDrop.getAttribute('data-id');
                    // alert(attrBtn);

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then( (result) => {
                        if (result.isConfirmed) {
                            const collect = {
                                'idproduct': attrBtn
                            }
                            fetch('/delete-product', {
                                headers:{
                                    'Accept': 'application/json',
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('.token').getAttribute('content')
                                }, 
                                method: 'POST',
                                body: JSON.stringify(collect) 
                            }).then((response) => response.json()) //or response.json()
                                .then((text) => {
                                    // alert(text.data);
                                    Swal.fire(
                                        'Deleted!',
                                        text.data,
                                        'success'
                                    )
                                    // window.location.href =    '/';
                                    setTimeout(function() { window.location.href = '/'}, 3000);
                            });
                        }
                    }); 
                }); 
            });
        </script>
@endsection
