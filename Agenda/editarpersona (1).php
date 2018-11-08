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
        require("db.php");

        $idcontacto = $_GET['persona_id'];

        require_once("db.php");

        $query = "SELECT Personas.`persona_nombre`, Personas.`persona_apellido`, Personas.`persona_Telefono`, Personas.`persona_email`, Paises.`pais_id` FROM `Personas`, `Paises` WHERE `Personas`.`persona_id` = $idcontacto;";
        


        $rsDATA = $DBengine -> query($query);

        $register = $rsDATA -> fetch_row();
        $nombre = $register[0];
        $apellido = $register[1];
        $telefono = $register[2];
        $email = $register[3];
        $paisid = $register[4];


    ?>
    <div class="row">
    <form action="editpersona.php" method="POST" class="col s12">
        <label>Nombre:
            <input type="text" name="nombre" value="<?php echo "$nombre "; ?>">
        </label>

        <label>Apellido:
            <input type="text" name="apellido" value="<?php echo $apellido; ?>">
        </label>

        <label>Telefono:
            <input type="number" name="telefono" value="<?php echo $telefono; ?>">
        </label>

        <label>Email:
            <input type="text" name="email" value="<?php echo $email; ?>">
        </label>

        <label>País:
        <select name="countries" required>
        <?php 
          require_once("db.php");

          $query = "SELECT * FROM `Paises`";
          $rsDATA = $DBengine -> query($query);
          while ($register = $rsDATA -> fetch_array()){ ?>

        <option value="<?php echo $register['pais_id'] ?>"><?php echo $register['pais_nombre']?></option>
        
        <?php } ?>
      </select>
    </label>

        <input type="hidden" name="idcontacto" value="<?php echo $idcontacto; ?>" />

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