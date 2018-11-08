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

    $per = $_POST["pers"];
    $can = $_POST["cana"];
    $fecha = $_POST["fecha"];
    $obs = $_POST["obse"];
    $idcontacto = $_POST["idcontacto"];

    $query = "UPDATE `Contactos` SET `Contactos_Personas_ID` = '$per', `Contactos_Canales_ID` = '$can', `Contactos_Fecha` = '$fecha', `Contactos_Observaciones` = '$obs' WHERE `Contactos`.`Contactos_ID` = '$idcontacto';";

    $resultado = mysqli_query($DBengine, $query);
    if(!$resultado) { ?>
      <div class="row">
          <div class="col s12 m6">
              <div class="card blue-grey darken-1 hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Edición Fallida</span>
                    <p>No se ha podido editar el contacto correctamente.</p>
                </div>
                <div class="card-action">
                    <a href="Contactos.php">Volver</a>
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
                    <p>El contacto se ha editado correctamente.</p>
                </div>
                <div class="card-action">
                    <a href="Contactos.php">Volver</a>
                </div>
              </div>
          </div>
        </div>
    <?php }

    mysqli_close($DBengine);

    ?>

</body>
</html>