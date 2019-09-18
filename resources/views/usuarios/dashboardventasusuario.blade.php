<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


<!-- grafi4cas -->
 

 <head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([

        ["Element", "Articulo", { role: "style" } ],
        <?php 
            foreach ($ventasusuario as $ventausuario) {
            echo '["'.$ventausuario->Articulo.'", '.$ventausuario->Total.', "#'.$ventausuario->phantom.'"],';
            }
         ?>  
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Ventas por Articulo",
        width: 700,
        height: 600,
        bar: {groupWidth: "60%"},
        legend: { position: "center" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
</head>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- graficas -->
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
      <a href="validaraccesotipousuario/">
        <span class="btn btn-primary">Admin Usuarios</span>
      </a>
      <a href="vistafacturas/">
        <span class="btn btn-primary">Facturas</span>
      </a>
      <a href="vistaarticulos/">
        <span class="btn btn-primary">Mnto. Articulos</span>
      </a>
      <a href="dashboardventasusuario/">
        <span class="btn btn-light">Estadisticas por Usuario</span>
      </a>
      <a href="gerencial/">
        <span class="btn btn-light">Estadisticas Gerencia</span>
      </a>
      
      <a href="{{ url('vistafacturas/') }}">
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

<div class="container-fluid">
<br><br>
 <div class="row">
    <div class="col-sm-5">
      <p class="h1">Ventas por Artículos </p>

      <p class="h4">Estatisticas generales</p>
      <div id="columnchart_values" style="width: 90%; height: 100%;"></div>
    </div>
    <div class="col-sm-4">
        <table class="table">
          <p class="h3">Rentabilidad por artículos</p>
          <p class="h5">Desgloce de rentabilidad por artículos</p>
          <thead class="thead-dark">
            <tr>
              <th scope="col">Articulo</th>
              <th scope="col">Precio Publico</th>
              <th scope="col">Precio Asociado</th>
              <th scope="col">Rentabilidad Asociado</th>
            </tr>
          </thead>
          <tbody>
            <?php $totalRen = 0; ?>
            
            @foreach ($Rentabilidad as $Rent)
            <tr>
                    <th scope="row">{{$Rent->Articulo}}</th>
                    <td>{{ $Rent->PrecioPublico }}</td>
                    <td>{{ $Rent->PrecioVentaAsociado }}</td>
                    <?php 
                        $rentabi =  $Rent->PrecioVentaAsociado - $Rent->PrecioPublico ;
                        $totalRen = $totalRen + $rentabi;
                     ?>
                    <td>{{$rentabi}}</td>
            </tr>
            @endforeach
            <tr>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col">TOTAL</th>
              <th scope="col">{{$totalRen}}</th>
            </tr>
           
          </tbody>
        </table>

        <br>
        <p class="h3">Usuarios Asociados</p>
        <p class="h5">Lista asociados relacionados para calculos de descuentos</p>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Codigo Usuairo</th>
              <th scope="col">Correo</th>
              <th scope="col">Nombre</th>
              <th scope="col">Ventas Acumuladas</th>

            </tr>
          </thead>
          @foreach ($UsuariosAsigna as $asigUsuario)
            <tr>
              <td>{{ $asigUsuario->idusuario }}</td>
              <td>{{ $asigUsuario->correo }}</td>
              <td>{{ $asigUsuario->nombreusuario }}</td>
              <td>{{ $asigUsuario->totalVenta }}</td>

            </tr>
          @endforeach
        </table>
    </div>
    <div class="col-sm-3 text-center">
      <h4>Puntos Acumulados</h4>
      <h4>
        <button type="button" class="btn btn-outline-primary">{{$PuntosUsuario}}</button>
      </h4>
    </div>
</div>

</div>
<script type="text/javascript">
$(document).ready(function() {
} );
</script>