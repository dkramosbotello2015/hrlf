<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<br><br><br>
<div class="container-fluid">
    <p class="h1 text-center">ESTADISTICAS GERENCIALES</p>
    <div class="row">
        <div class="col-sm-6">
            <div id="Sarah_chart_div" style="border: 1px solid #ccc"></div>
        </div>
        <div class="col-sm-6">
            <div id="Anthony_chart_div" style="border: 1px solid #ccc"></div>
        </div>
    </div>
  
</div>


<!-- gVentaCategorias -->


    <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart for Sarah's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(Grafica1);

      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(Grafica2);

      // Callback that draws the pie chart for Sarah's pizza.
      function Grafica1() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
        <?php 
            foreach ($gVentausuarios as $gVentausuario) {
            echo "['".$gVentausuario->nombre."', ".$gVentausuario->Total."], ";
            }
        ?>
        ]);

        // Set options for Sarah's pie chart.
        var options = {title:'Ventas por Asociado',
                       width:800,
                       height:600};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
        chart.draw(data, options);
      }

      // Callback that draws the pie chart for Anthony's pizza.
      function Grafica2() {

        // Create the data table for Anthony's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
           <?php 
            foreach ($gVentaCategorias as $gVentaCategoria) {
            echo "['".$gVentaCategoria->nombrecategoria."', ".$gVentaCategoria->TotalCategoria."], ";
            }
        ?>
        ]);

        // Set options for Anthony's pie chart.
        var options = {title:'Ventas por Categoria',
                       width:800,
                       height:600};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
        chart.draw(data, options);
      }
    </script>