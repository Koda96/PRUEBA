<!DOCTYPE html>
  <html>
    <head>
      <title>Servicio de Pedidos Online</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="utf-8">
      <style>
        h3 {
          font-size: 3.7em;
        }
        li:hover{
          background-color: #f80559;
        }
      </style>
    </head>

    <body>
      <nav>
        <div class="nav-wrapper">
          <a href="index.html" class="brand-logo center">Servicio de Pedidos Online</a>
            <ul class="left hide-on-med-and-down">
              <li><a href="Pedidos.php"><i class="material-icons center">add_shopping_cart</i>Pedidos</a></li>
              <li><a href="Canales.php"><i class="material-icons center">public</i>Canales</a></li>
              <li class="active"><a href="Destinos.php"><i class="material-icons center">room</i>Destinos</a></li>
              <li><a href="Productos.php"><i class="material-icons center">restaurant</i>Productos</a></li>
            </ul>
        </div>
      </nav>
    <div class="row">  
    <form action="guardarNuevoDestino.php" method="POST" class="col s12">
    <label>Barrio:
      <input type="text" name="Barrio" placeholder="Barrio" class="validate" required>
    </label>

    <label>Calle:
      <input type="text" name="Calle" placeholder="Calle" class="validate" required>
    </label>

    <label>Numero:
      <input type="number" name="Numero" placeholder="Numero" class="validate" required>
    </label>

    <label>Piso:
      <input type="number" name="Piso" placeholder="Piso" class="validate" >
    </label>

    <label>Depto:
      <input type="number" name="Depto" placeholder="Depto" class="validate" >
    </label>
    
    <button class="btn waves-effect waves-light" type="submit" name="action">Añadir
      <i class="material-icons right">check</i>
    </button>
    </form>
    </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script>
        $(document).ready(function(){
          $('select').formSelect();
        });
      </script>
    </body>
  </html>