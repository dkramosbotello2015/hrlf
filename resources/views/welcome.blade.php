<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>





<div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh">
  <div >
    <div class="center-block">
      <div class="row">
        <div class="col-xs-4">
            <img src="/img/logo.png" class="css-class" alt="alt text">
        </div>
        <div class="col-xs-2">

        </div>
        <div class="col-xs-6">
          <form action="/validaraccesotipousuario" method="get">
            <input  type="hidden" 
                    name="_token" 
                    value="{{ csrf_token() }}">

            <div class="form-group">
              <label for="exampleInputEmail1" class="float-right">USUARIO</label>
              
              <input 
                type="text" 
                name="correo"
                class="form-control" 
                id="exampleInputEmail1" 
                aria-describedby="emailHelp" 
                placeholder="Ingresa Usuario">
                <!-- <small id="emailHelp" class="form-text text-muted">Usuarios de Administración.</small> -->

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="float-right">CLAVE</label>
              <input 
                    type="password" 
                    name="clave"
                    class="form-control" 
                    id="exampleInputPassword1" 
                    placeholder="Clave de acceso">
            </div>
            
            <button type="submit" class="btn btn-primary float-right">INGRESAR</button>
          </form> 
        </div>
      </div>
        <div class="row"> 
            @if (session('alert'))
                    <div class="alert alert-success">
                    {{ session('alert') }}
                    </div>
            @endif
        </div>
  </div>
</div>

