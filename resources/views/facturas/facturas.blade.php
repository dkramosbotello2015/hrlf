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
<div class="container-fluid">
<br><br>
<h1>Historico Facturas</h1>
<h2>
  <a href="{{ url('crearfacturas/') }}">
        <span class="btn btn-primary btn-xm float-right">Agregar Factura</span>  
  </a>
</h2>
<br><br><br>
<table id="usuarios" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No. Pedido</th>
                <th>Fecha Factura</th>
                <th>Estado</th>
                <th>Factor Descuento</th>
                <th>Usuario</th>
                <th>Periodo Factura</th>
                <th>Estado Periodo</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($facturas as $factura)
             <tr>
                 <td>{{$factura->NumeroPedido}}</td>
                 <td>{{$factura->FechaFactura}}</td>
                 <td>{{$factura->EstadoFactura}}</td>
                 <td>{{$factura->FactorDescuento}}</td>
                 <td>{{$factura->CorreUsuario}}</td>
                 <td>{{$factura->Periodo}}</td>
                 <td>{{$factura->EstadoPeriodo}}</td>
                 <td>
                    <div>
                     <a href="/editar?">
                        <button type="submit" class="btn btn-info">DETALLE</button> &nbsp;&nbsp;&nbsp;
                     </a>

                     @if ($factura->EstadoFactura <> "Facturado")
                     <a href="/procesarfactura?codigopedido={{$factura->NumeroPedido}}">
                        <button type="submit" class="btn btn-success">FACTURAR</button> &nbsp;&nbsp;&nbsp;
                     </a>
                     @endif
                    </div>


                 </td>
             </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No. Factura</th>
                <th>Fecha Factura</th>
                <th>Estado Factura</th>
                <th>Factor Descuento</th>
                <th>Usuario</th>
                <th>Periodo Factura</th>
                <th>Estatod Periodo</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</div>



<script type="text/javascript">
$(document).ready(function() {
    $('#usuarios').DataTable({
    "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});
} );
</script>
@include('footer')