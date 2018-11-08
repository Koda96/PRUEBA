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
	<table id="mt" class="striped centered highlight responsive-table">
		<thead>
          <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Acciones</th>
          </tr>
        </thead>
		<?php
			require_once("db.php");
			$query = "SELECT * FROM `Canales`";
			$rsDATA = $DBengine -> query($query);
			while ($register = $rsDATA -> fetch_row()) {
			    
				echo " <tr>
						<td>".$register[0]."</td>"

						."<td>".$register[1]."</td>"
						."<td><a class='waves-effect waves-light btn' href='editarcanal.php? Canales_id=".$register[0]."'>Editar</a>
                            <a class='waves-effect waves-light btn' href='eliminarcanal.php? Canales_id=".$register[0]."' onClick='return confirm(`¿Está seguro que desea eliminar este registro?`)'>Eliminar</a></td>"
					."</tr>";
				
			}
		?>
	</table>
	<p class="center-align">
		<a class="btn-floating btn-large waves-effect waves-light red" href="addcanales.php"><i class="material-icons">add</i></a>
	</p>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>