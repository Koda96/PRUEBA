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
    <div class="row">
    <form action="guardarcanal.php" method="POST" class="col s12 left-align">
		<p class="left-align">
			<input type="text" name="canal" placeholder="Nombre del Canal"style="width:800px" required>
		</p>
		<button class="btn waves-effect waves-light" type="submit" name="action">Añadir
      		<i class="material-icons right">check</i>
    	</button>
	</form>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>