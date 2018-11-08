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

        $idcontacto = $_GET['Contactos_ID'];

        require_once("db.php");

        $query = "SELECT Contactos.`Contactos_Fecha`, Contactos.`Contactos_Observaciones`, Personas.`persona_nombre`, Canales.`Canales_Nombre`, Personas.`persona_id`, Canales.`Canales_id` FROM `Contactos`, `Personas`, `Canales` WHERE Contactos.`Contactos_ID` = $idcontacto AND Contactos.Contactos_Personas_ID = Personas.persona_id AND Contactos.Contactos_Canales_ID = Canales.Canales_id;";

        $rsDATA = $DBengine -> query($query);

        $register = $rsDATA -> fetch_row();
        $per = $register[2];
        $can = $register[3];
        $fecha = $register[0];
        $obs = $register[1];
        $perid = $register[4];
        $canid = $register[5];
    ?>
    <div class="row">
    <form action="editcontacto.php" method="POST" class="col s12">


    <label>Persona:
      <select name="pers" required>
        <option value="<?php echo $perid ?>"><?php echo $per?></option>
        <?php 
          require_once("db.php");

          $query = "SELECT * FROM `Personas`";
          $rsDATA = $DBengine -> query($query);
          while ($register = $rsDATA -> fetch_array()){ ?>

        <option value="<?php echo $register['persona_id'] ?>"><?php echo $register['persona_nombre']?></option>
        
        <?php } ?>
      </select>
    </label>

    <label>Canal:
        <select name="cana" required>
            <option value="<?php echo $canid ?>"><?php echo $can?></option>
        <?php 
          require_once("db.php");

          $query = "SELECT * FROM `Canales`";
          $rsDATA = $DBengine -> query($query);
          while ($register = $rsDATA -> fetch_array()){ ?>

        <option value="<?php echo $register['Canales_id'] ?>"><?php echo $register['Canales_nombre']?></option>
        
        <?php } ?>
      </select>
    </label>

        <label>Fecha:
            <input type="date" name="fecha" value="<?php echo "$fecha"; ?>">
        </label>

        <label>Observacion:
            <input type="text" name="obse" value="<?php echo $obs; ?>">
        </label>

        <input type="hidden" name="idcontacto" value="<?php echo $idcontacto; ?>" />

        <button class="btn waves-effect waves-light" type="submit" name="action">Editar
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