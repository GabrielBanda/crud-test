<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$title}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!-- Datatable -->
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

        <!-- Select 2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- SweetAlert 2 -->
        <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->

        <!-- Native Styles -->
        <link rel="stylesheet" href="/css/app.css">

    </head>
<body>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Products</a></li>
    @if(!empty($breadUrlCreate))
    <li class="breadcrumb-item"><a href="{{$breadUrlCreate}}">{{$breadTitleCreate}}</a></li>
    @endif
    @if(!empty($breadUrlShow))
    <li class="breadcrumb-item"><a href="{{$breadUrlShow}}">{{$breadTitleShow}}</a></li>
    @endif
    <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
  </ol>
</nav>

<div class="cabeza">
    @yield("head") 
</div>
<div class="cuerpo">
    @yield("body")
    
</div>
<div class="pie">
    @yield("footer")
</div>
</body>

<!-- datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"> </script>
<!-- select2.js -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- SweetAlert 2 -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dt-table').DataTable(); 
        $('.js-example-basic-single').select2();
    } );
    // swal("Titulo", "Prueba", "success");
    

   
</script>


</html>