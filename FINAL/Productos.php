<!DOCTYPE html>
  <html>
    <head>
      <title>Servicio de Pedidos Online</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="utf-8">
      <style>
        h3 {
          font-size: 3.7em;
        }
        li:hover{
          background-color: #f80559;
        }
      </style>
    </head>

    <body>
      <nav>
        <div class="nav-wrapper">
          <a href="index.html" class="brand-logo center">Servicio de Pedidos Online</a>
            <ul class="left hide-on-med-and-down">
              <li><a href="Pedidos.php"><i class="material-icons center">add_shopping_cart</i>Pedidos</a></li>
              <li><a href="Canales.php"><i class="material-icons center">public</i>Canales</a></li>
              <li><a href="Destinos.php"><i class="material-icons center">room</i>Destinos</a></li>
              <li class="active"><a href="Productos.php" ><i class="material-icons center">restaurant</i>Productos</a></li>
            </ul>
        </div>
      </nav>
	<table class="striped centered highlight responsive-table">
		<thead>
          <tr>
            <th>Nombre</th>
            <th>Precio</th>
          </tr>
        </thead>

		<?php
			require_once("db.php");
      $query = "SELECT `Productos_Nombre`, `Productos_Precio` FROM `Productos`";
			$rsDATA = $DBengine -> query($query);
            
			while ($register = $rsDATA -> fetch_row()) {
        echo " <tr>
						<td>".$register[0]."</td>"
						."<td> $".$register[1]."</td>"
					."</tr>";
			}
		?>
	</table>
  <p class="center-align">
  <a class="btn waves-effect waves-light" href="addPedido.php">Realizar pedido <i class="material-icons right">send</i></a>
  </p>
</body>
</html>