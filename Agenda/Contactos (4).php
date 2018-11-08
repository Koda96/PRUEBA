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

	<table class="striped centered highlight responsive-table">
		<thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>País</th>
            <th>Observaciones</th>
            <th>Fecha de contacto</th>
            <th>Medio de contacto</th>
            <th>Acciones</th>
          </tr>
        </thead>
	
		<?php
            require_once("db.php");
            /*$query = "SELECT * FROM `Personas`";*/
            $query = "SELECT `persona_nombre` ,`persona_apellido`,`persona_Telefono`,`persona_email`, Paises.`pais_nombre`, Contactos.`Contactos_Observaciones`, Contactos.`Contactos_Fecha`, Canales.`Canales_Nombre`, `persona_id` , `Contactos`.`Contactos_ID` FROM `Contactos`, `Personas`, `Canales`, `Paises` WHERE Personas.persona_id = `Contactos_Personas_ID` AND Canales.Canales_id = `Contactos_Canales_ID` AND Personas.persona_pais_id = Paises.pais_id";
            $rsDATA = $DBengine -> query($query);
           
           
            while ($register = $rsDATA -> fetch_row()) {
               
                echo " <tr>
                        <td>".$register[0]."</td>"
 
                        ."<td>".$register[1]."</td>"
                        ."<td>".$register[2]."</td>"
                        ."<td>".$register[3]."</td>"
                        ."<td>".$register[4]."</td>"
                        ."<td>".$register[5]."</td>"
                        ."<td>".$register[6]."</td>"
                        ."<td>".$register[7]."</td>"
                        ."<td><a class='waves-effect waves-light btn' href='editarcontacto.php? Contactos_ID=".$register[9]."'>Editar</a>
                            <a class='waves-effect waves-light btn' href='eliminarcontacto.php? Contactos_ID=".$register[9]."' onClick='return confirm(`¿Está seguro que desea eliminar este registro?`)'>Eliminar</a></td>"
                    ."</tr>";
            }
        ?>
	</table>	
<p class="center-align">
    <a class="btn-floating btn-large waves-effect waves-light red" href="addcontacto.php"><i class="material-icons">add</i></a>
  </p>
</body>
</html>