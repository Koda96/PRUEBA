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
              <li><a href="Productos.php"><i class="material-icons center">restaurant</i>Productos</a></li>
            </ul>
        </div>
      </nav>

      <?php
        require("db.php");

        $idPedido = $_GET['Pedidos_ID'];

        require_once("db.php");

         $query = "SELECT Productos.`Productos_ID`, Productos.`Productos_Nombre`, Combos.`Combos_Cantidad`, Pedidos.`Pedidos_Fecha`, Canales.`Canales_id`, Canales.`Canales_Nombre`, Pedidos.`Pedidos_ID`, Pedidos.`Pedidos_Destinos_ID`, Pedidos.`Pedidos_FormaPago_ID`, FormaPago.`FormaPago_Nombre` FROM `Pedidos`, `Productos`, `Canales`, `Combos`, `Destinos`, `FormaPago` WHERE Pedidos.`Pedidos_ID` = $idPedido AND Combos.Combos_Pedidos_ID = Pedidos.Pedidos_ID AND Productos.Productos_ID = Combos.Combos_Productos_ID AND Canales.Canales_id = Pedidos.Pedidos_Canales_ID AND FormaPago.FormaPago_ID = Pedidos.Pedidos_FormaPago_ID ";

      
        //$query = "SELECT `Destinos_Barrio`, `Destinos_Calle`, `Destinos_Numero`, `Destinos_Piso`, `Destinos_Depto` FROM  `Destinos` WHERE `Destinos`.`Destinos_ID` = $idDestino;";
        

        $rsDATA = $DBengine -> query($query);

        $register = $rsDATA -> fetch_row();
        $Producto_ID = $register[0];
        $Producto_Nombre = $register[1];
        $Cantidad = $register[2];
        $Fecha = $register[3];
        $Canal_ID = $register[4];
        $Canal_Nombre = $register[5];
        $FormaPago_Nombre = $register[9];
        $FormaPago_ID = $register[8];
        $Destinos_ID = $register[7];
        
        require_once("db.php");
          $query = "SELECT * FROM `Destinos`";
          $rsDATA = $DBengine -> query($query);

          while ($register = $rsDATA -> fetch_array()){
            if ($register['Destinos_ID']==$Destinos_ID) {
                $Destinos_Barrio=$register['Destinos_Barrio'];
                $Destinos_Calle=$register['Destinos_Calle'];
                $Destinos_Numero=$register['Destinos_Numero'];
                $Destinos_Piso=$register['Destinos_Piso'];
                $Destinos_Depto=$register['Destinos_Depto'];
            }
        } 

    ?>
    <div class="row">
    <form action="editPedido.php" method="POST" class="col s12">
        <label>Producto:
      <select name="Producto" required>
        <option value="<?php echo $Producto_ID ?>"><?php echo $Producto_Nombre ?></option>
        <?php 
          require_once("db.php");

          $query = "SELECT * FROM `Productos`";
          $rsDATA = $DBengine -> query($query);
          while ($register = $rsDATA -> fetch_array()){ ?>

        <option value="<?php echo $register['Productos_ID'] ?>"><?php echo $register['Productos_Nombre']?></option>
        
        <?php } ?>
      </select>
    </label>

    <label>Cantidad:
      <input type="number" name="Cantidad" value="<?php echo $Cantidad; ?>">
    
      <label>Fecha:
      <input type="date" name="Fecha" value="<?php echo "$Fecha"; ?>">
    </label>

    <label>Destino:
      <select name="Destino" required>
        <option value="<?php echo $Destinos_ID ?>"><?php echo "Barrio: ".$Destinos_Barrio." //Calle: ".$Destinos_Calle." //Numero: ".$Destinos_Numero." //Piso: ".$Destinos_Piso." //Depto: ".$Destinos_Depto?></option>
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

    <label>Medio de Contacto:
      <select name="Canal" required>
        <option value="<?php echo $Canal_ID ?>"><?php echo $Canal_Nombre ?></option>
        <?php 
          require_once("db.php");

          $query = "SELECT * FROM `Canales`";
          $rsDATA = $DBengine -> query($query);
          while ($register = $rsDATA -> fetch_array()){ ?>

        <option value="<?php echo $register['Canales_id'] ?>"><?php echo $register['Canales_nombre']?></option>
        
        <?php } ?>
      </select>
    </label>

    <label>Forma de Pago:
      <select name="FormaPago" required>
        <option value="<?php echo $FormaPago_ID ?>"><?php echo $FormaPago_Nombre ?></option>
        <?php 
          require_once("db.php");

          $query = "SELECT * FROM `FormaPago`";
          $rsDATA = $DBengine -> query($query);
          while ($register = $rsDATA -> fetch_array()){ ?>

        <option value="<?php echo $register['FormaPago_ID'] ?>"><?php echo $register['FormaPago_Nombre']?></option>
        
        <?php } ?>
      </select>
    </label>

        <input type="hidden" name="idPedido" value="<?php echo $idPedido; ?>" />

        <button class="btn waves-effect waves-light" type="submit" name="action">Añadir
            <i class="material-icons right">check</i>
        </button>

    </form>
    </div>

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