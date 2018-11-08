<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    <title>Agenda de Contactos</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
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