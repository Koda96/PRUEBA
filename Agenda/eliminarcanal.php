<!DOCTYPE html>
<html>
<head>
    <title>Agenda de Contactos</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
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

    $idcanal = $_GET['Canales_id'];

    $query = "DELETE FROM `Canales` WHERE `Canales`.`Canales_id` = '$idcanal';";

    $resultado = mysqli_query($DBengine, $query);
    if(!$resultado) { ?>
      <div class="row">
          <div class="col s12 m6">
              <div class="card blue-grey darken-1 hoverable">
                <div class="card-content white-text">
                    <span class="card-title">No se ha podido eliminar</span>
                    <p>Ha ocurrido un error al eliminar el canal.</p>
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
                    <span class="card-title">Se elimino correctamente</span>
                    <p>El canal se ha eliminado correctamente.</p>
                </div>
                <div class="card-action">
                    <a href="Canales.php">Volver</a>
                </div>
              </div>
          </div>
        </div>
    <?php }

    mysqli_close($DBengine);

    ?>

</body>
</html>