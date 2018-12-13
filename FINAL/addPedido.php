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
              <li class="active"><a href="Pedidos.php"><i class="material-icons center">add_shopping_cart</i>Pedidos</a></li>
              <li><a href="Canales.php"><i class="material-icons center">public</i>Canales</a></li>
              <li><a href="Destinos.php"><i class="material-icons center">room</i>Destinos</a></li>
              <li><a href="Productos.php" class="Hola"><i class="material-icons center">restaurant</i>Productos</a></li>
            </ul>
        </div>
      </nav>

      <div class="row">  
    <form action="guardarPedido.php" method="POST" class="col s12">

      <label class="col s12">Producto:
      <select name="Producto" required>
        <option value="0">Elegir Producto</option>
        <?php 
          require_once("db.php");

          $query = "SELECT * FROM `Productos`";
          $rsDATA = $DBengine -> query($query);
          while ($register = $rsDATA -> fetch_array()){ ?>

       <option value="<?php echo $register['Productos_ID'] ?>"><?php echo $register['Productos_Nombre']." ($".$register['Productos_Precio'].")"?></option>
        
        <?php 
        //$Productos_ID=$register['Productos_ID'];
      } ?>
      </select>
    </label>
  <label class="col s12">Cantidad:
      <input type="number" name="Cantidad" placeholder="Cantidad" class="validate" required>
    </label>
  <label class="col s12">Fecha:
      <input type="date" name="Fecha" placeholder="dd / mm/ aaaa" class="validate" required>
    </label>
    


<div>
  <label class="col s6">Destino:
      <select name="Destino" required>
        <option value="0">Elegir Destino</option>
        <?php 
          require_once("db.php");

          $query = "SELECT * FROM `Destinos`";
          $rsDATA = $DBengine -> query($query);
          while ($register = $rsDATA -> fetch_array()){ ?>

        <option value="<?php echo $register['Destinos_ID'] ?>"><?php echo "Barrio: ".$register['Destinos_Barrio']." //Calle: ".$register['Destinos_Calle']." //Numero: ".$register['Destinos_Numero']." //Piso: ".$register['Destinos_Piso']." //Depto: ".$register['Destinos_Depto']?></option>
        
        <?php 
      } ?>
      </select>
      
    </label>
      <p><a class="btn waves-effect red darken-1" href="nuevoDestino.php">Nuevo destino <i class="material-icons right">send</i></a></p>
      
</div>

  <label class="col s12">Medio de Contacto:
      <select name="Canal" required>
        <option value="0">Elegir Canal</option>
        <?php 
          require_once("db.php");

          $query = "SELECT * FROM `Canales`";
          $rsDATA = $DBengine -> query($query);
          while ($register = $rsDATA -> fetch_array()){ ?>

        <option value="<?php echo $register['Canales_id'] ?>"><?php echo $register['Canales_nombre']?></option>
        
        <?php } ?>
      </select>
    </label>

    <label class="col s12">Forma de Pago:
      <select name="FormaPago" required>
        <option value="0">Elegir Forma de pago</option>
        <?php 
          require_once("db.php");

          $query = "SELECT * FROM `FormaPago`";
          $rsDATA = $DBengine -> query($query);
          while ($register = $rsDATA -> fetch_array()){ ?>

        <option value="<?php echo $register['FormaPago_ID'] ?>"><?php echo $register['FormaPago_Nombre']?></option>
        
        <?php } ?>
      </select>
    </label>

    <button class="btn waves-effect red darken-1" type="submit" name="action">Añadir
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