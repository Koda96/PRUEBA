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

<?php
        require("db.php");

        $idDestino = $_GET['Destinos_ID'];

        require_once("db.php");

        $query = "SELECT `Destinos_Barrio`, `Destinos_Calle`, `Destinos_Numero`, `Destinos_Piso`, `Destinos_Depto` FROM  `Destinos` WHERE `Destinos`.`Destinos_ID` = $idDestino;";
        

        $rsDATA = $DBengine -> query($query);

        $register = $rsDATA -> fetch_row();
        $Barrio = $register[0];
        $Calle = $register[1];
        $Numero = $register[2];
        $Piso = $register[3];
        $Depto = $register[4];


    ?>
    <div class="row">
    <form action="editDestino.php" method="POST" class="col s12">
        <label>Barrio:
            <input type="text" name="Barrio" value="<?php echo "$Barrio "; ?>">
        </label>

        <label>Calle:
            <input type="text" name="Calle" value="<?php echo $Calle; ?>">
        </label>

        <label>Numero:
            <input type="number" name="Numero" value="<?php echo $Numero; ?>">
        </label>

        <label>Piso:
            <input type="number" name="Piso" value="<?php echo $Piso; ?>">
        </label>

        <label>Depto:
            <input type="number" name="Depto" value="<?php echo $Depto; ?>">
        </label>

        <input type="hidden" name="idDestino" value="<?php echo $idDestino; ?>" />

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