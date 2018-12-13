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
              <li class="active"><a href="Canales.php"><i class="material-icons center">public</i>Canales</a></li>
              <li><a href="Destinos.php"><i class="material-icons center">room</i>Destinos</a></li>
              <li><a href="Productos.php"><i class="material-icons center">restaurant</i>Productos</a></li>
            </ul>
        </div>
      </nav>

	<?php
        require("db.php");

        $idcanal = $_GET['Canales_id'];

        require_once("db.php");

        $query = "SELECT Canales.`Canales_id`, Canales.`Canales_nombre` FROM `Canales` WHERE `Canales`.`Canales_id` = $idcanal;";
        


        $rsDATA = $DBengine -> query($query);

        $register = $rsDATA -> fetch_row();
        $nombrecanal = $register[1];


    ?>
    <div class="row">
    <form action="editcanal.php" method="POST" class="col s12 left-align">
        <p class="left-align">
            <input type="text" name="canal" placeholder="Nombre del Canal"style="width:800px" value="<?php echo $nombrecanal; ?>" required>
        </p>
        <input type="hidden" name="idcanal" value="<?php echo $idcanal; ?>" />
        <button class="btn waves-effect waves-light" type="submit" name="action">Añadir
            <i class="material-icons right">check</i>
        </button>
    </form>
    </div>
</body>
</html>