<!DOCTYPE html>
  <html>
    <head>
      <title>Agenda de Contactos</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="utf-8">
      <style>
        h3 {
          font-size: 3.7em;
        }
      </style>
    </head>
    <body>
      <nav>
        <div class="nav-wrapper">
          <a href="index.html" class="brand-logo center">Agenda</a>
            <ul class="left hide-on-med-and-down">
              <li><a href="Canales.php"><i class="material-icons center">public</i>Canales</a></li>
              <li><a href="Personas.php"><i class="material-icons center">person</i>Personas</a></li>
              <li><a href="Contactos.php"><i class="material-icons center">recent_actors</i>Contactos</a></li>
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