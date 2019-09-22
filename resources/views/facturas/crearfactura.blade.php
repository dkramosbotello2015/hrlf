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

      <a href={{url('validaraccesotipousuario')}}>
        <span class="btn btn-primary">Admin Usuarios</span>
      </a>
      <a href={{url('vistafacturas')}}>
        <span class="btn btn-primary">Facturas</span>
      </a>
      <a href={{url('vistaarticulos')}}>
        <span class="btn btn-primary">Mnto. Articulos</span>
      </a>
      <a href={{url('dashboardventasusuario')}}>
        <span class="btn btn-light">Estadisticas por Usuario</span>
      </a>
      <a href={{url('gerencial')}}>
        <span class="btn btn-light">Estadisticas Gerencia</span>
      </a>
      
      <a href={{url('vistaarticulos')}}"{{ url('vistafacturas/') }}">
        <span class="btn btn-primary btn-sm float-right"> Cerrar </span>  
      </a>

    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>

  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>

<div class="container">
<br><br>
<h2>
    Registrar Pedido
</h2>
<br><br>
    <form action="/registrafactura" method="get" id ="CrearFacturaDetalle">
    <?php 
      $int= mt_rand(1262055681,1262055681)
     ?>
    <input  type="hidden" 
        name="_token" 
        value="{{ csrf_token() }}">
    <input type="hidden"
        name ="codigopedido"
        value="{{date('mdHis')}}">
    <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="cantidadarticulo">Codigo Pedido</label>
                    <input  type="text" 
                            class="form-control" 
                            id="codigopedido"  
                            value='{{date("mdHis")}}' 
                            name="codigopedidoVista" 
                            disabled>
                </div>
            </div>
            
                       
            <div class="col-6">
                
            </div>
    </div>
    <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="datosarticulo">Selecionar Articulo</label>
                    <select class="form-control" id="datosarticulo">
                    @foreach ($articulos as $articulo)
                      <option value ="{{$articulo->idarticulo}}">{{$articulo->descripcion}}</option>
                    @endforeach
                    </select>
                    <!-- <small id="emailHelp" class="form-text text-muted">Agregar Producto.</small> -->
                </div>                
            <span type="text" class="btn btn-success" id = "AgregarArticulo">AGREGAR</span>
            </div>
            
                       
            <div class="col-6">
                  <div class="form-group">
                    <label for="cantidadarticulo">Cantidad</label>
                    <input type="number" class="form-control" id="cantidadarticulo" aria-describedby="emailHelp" placeholder="Ingrese Cantidad">
                    <!-- <small id="emailHelp" class="form-text text-muted">Cantidad solicitada.</small> -->
                  </div>
            <!-- <span type="text" class="btn btn-primary float-right" id = "CrearFactura">CREAR</span> -->
            <button class="btn btn-primary float-right" id = "CrearFactura">CREAR</button>
            </div>
    </div>

    </form> 
    <div class="container">
        <table class="table" id ="CarritoCompra">
            <tr>
                <td>Articulo</td>
                <td>Cantidad Solicitada</td>
            </tr>
        </table>
    </div>
</div>



<script type="text/javascript">
$(document).ready(function() {
    $("#AgregarArticulo").click(function(){

        var idArticulo          =  $("#datosarticulo").val();
        var CantidadArticulo    =  $("#cantidadarticulo").val();
        var DescripcionArticulo =  $('#datosarticulo option:selected').html();


        if (CantidadArticulo > 0) {
          $('<input>').attr({
              type: 'hidden',
              id: 'cantidadarticulo',
              name: 'cantidadarticulo[]',
              value: CantidadArticulo
          }).appendTo('form');

          $('<input>').attr({
              type: 'hidden',
              id: 'idArticulo',
              name: 'idArticulo[]',
              value: idArticulo
          }).appendTo('form');

          var htmlTags = 
          '<tr>'+
          '<td>' + DescripcionArticulo + '</td>'+
          '<td>' + CantidadArticulo + '</td>'+
          '</tr>';
        
          $('#CarritoCompra tbody').append(htmlTags);          
        }

    });

} );
</script>