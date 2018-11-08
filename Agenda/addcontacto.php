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
    <div class="row">  
    <form action="guardarcontacto.php" method="POST" class="col s12">
      <label>Persona:
      <select name="per" required>
        <option value="0">Elegir Persona</option>
        <?php 
          require_once("db.php");

          $query = "SELECT * FROM `Personas`";
          $rsDATA = $DBengine -> query($query);
          while ($register = $rsDATA -> fetch_array()){ ?>

        <option value="<?php echo $register['persona_id'] ?>"><?php echo $register['persona_nombre']?></option>
        
        <?php } ?>
      </select>
    </label>

    <label>Medio de Contacto:
      <select name="can" required>
        <option value="0">Elegir Canal</option>
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
      <input type="date" name="fecha" placeholder="dd/mm/aaaa" class="validate" required>
    </label>

    <label>Observaciones:
      <input type="text" name="obs" placeholder="Observacion" class="validate" required>
    </label>

    <button class="btn waves-effect waves-light" type="submit" name="action">Añadir
      <i class="material-icons right">check</i>
    </button>
    </form>
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