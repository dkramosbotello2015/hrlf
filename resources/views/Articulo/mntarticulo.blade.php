<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h4 class="text-white">Menu</h4>
      <span class="btn btn-primary">Usuarios</span>
      <a href="vistafacturas/">
        <span class="btn btn-primary">Facturas</span>
      </a>
      <a href="mantenimientoarticulo/">
        <span class="btn btn-primary">Mnto. Articulos</span>
      </a>
      <span class="btn btn-primary"></span>
      <a href="{{ url('vistafacturas/') }}">
        <span class="btn btn-primary btn-sm float-right">Cerrar</span>  
      </a>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>

<div class="container-fluid">
<br><br>
<h1>Mantenimiento Articulos</h1>
<h3>Los en precios afectaran las transacciones en el períodod en circulación.</h3>
<br><br><br>
 
</div>
<br><br>
  <div class="container">
  <h1>Edición de Articulo</h1>
    <div class="row">
      <div class="col-xl-12">
        <form action="/modificararticulo" method="get">
          <input  type="hidden" 
                  name="_token" 
                  value="{{ csrf_token() }}">
          <input  type="hidden" 
                  name="idarticulo" 
                  value="{{$Articulo->idarticulo}}">
          <div class="form-group">
            <label for="exampleInputEmail1" >Descripcion</label>
            
            <input  
              type="text" 
              value="{{$Articulo->descripcion}}"
              name="descripcion"
              class="form-control" 
              id="exampleInputEmail1" 
              aria-describedby="emailHelp" 
              placeholder="Modificar Descripción">
              <!-- <small id="emailHelp" class="form-text text-muted">Usuarios de Administración.</small> -->

          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" >Precio</label>
            <input    
                  type="text" 
                  name="precio"
                  class="form-control" 
                  id="exampleInputPassword1" 
                  value="{{$Articulo->precio}}"
                  placeholder="Modificación Precio Base.">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" >Cantidad Actual de Stock </label>
            <input   disabled
                  type="text" 
                  name="cantidad"
                  class="form-control" 
                  id="cantidad" 
                  value="{{$Articulo->stock}}"
                  placeholder="Cantidad Disponible">
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1" >Cantidad a Ingresar. </label>
            <input  
                  type="number"
                  name="cantidadaingresar"
                  class="form-control text-danger" 
                  id="cantidad" 
                  value=""
                  placeholder="Se sumara a inventario la cantidad a ingresar. ">
          </div>
          <button type="submit" class="btn btn-primary float-right">Modificar</button>
        </form> 
      </div>
    </div>
  </div>


<script type="text/javascript">
$(document).ready(function() {
 
} );
</script>