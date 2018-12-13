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
    require_once("db.php");

    $canal = $_POST["canal"];

    $query = "INSERT INTO `Canales` (`Canales_id`, `Canales_nombre`) VALUES (NULL, '$canal');";

    $resultado = mysqli_query($DBengine, $query);
    if(!$resultado) { ?>
      <div class="row">
          <div class="col s12 m6">
              <div class="card blue-grey darken-1 hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Registro fallido</span>
                    <p>Ha ocurrido un error al registrar el canal en la agenda de contactos.</p>
                </div>
                <div class="card-action">
                    <a href="Canales.php">Volver</a>
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
                    <span class="card-title">Registro exitoso</span>
                    <p>El registro ha sido exitoso, para continuar haga click al enlace de abajo.</p>
                </div>
                <div class="card-action">
                    <a href="Canales.php">Aceptar</a>
                </div>
              </div>
          </div>
        </div>
    <?php }

    mysqli_close($DBengine);
    ?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
  </html>