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
    require_once("db.php");

    $Barrio = $_POST["Barrio"];
    $Calle = $_POST["Calle"];
    $Numero = $_POST["Numero"];
    $Piso = $_POST["Piso"];
    $Depto = $_POST["Depto"];
    $idDestino = $_POST["idDestino"];

    $query = "UPDATE `Destinos` SET `Destinos_Barrio` = '$Barrio', `Destinos_Calle` = '$Calle', `Destinos_Numero` = '$Numero', `Destinos_Piso` = '$Piso', `Destinos_Depto` = '$Depto' WHERE `Destinos`.`Destinos_ID` = '$idDestino';";

    $resultado = mysqli_query($DBengine, $query);
    if(!$resultado) { ?>
      <div class="row">
          <div class="col s12 m6">
              <div class="card blue-grey darken-1 hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Edición Fallida</span>
                    <p>No se ha podido editar la persona correctamente.</p>
                </div>
                <div class="card-action">
                    <a href="Destinos.php">Volver</a>
                </div>
              </div>
          </div>
        </div>
    <?php
    }else{ ?>
      <div class="row">
          <div class="col s12 m6">
              <div class="card blue-grey darken-1 hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Edición exitosa</span>
                    <p>La persona se ha editado correctamente.</p>
                </div>
                <div class="card-action">
                    <a href="Destinos.php">Volver</a>
                </div>
              </div>
          </div>
        </div>
    <?php }

    mysqli_close($DBengine);

    ?>

</body>
</html>