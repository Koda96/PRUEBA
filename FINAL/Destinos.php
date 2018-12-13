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
              <li class="active"><a href="Destinos.php"><i class="material-icons center">room</i>Destinos</a></li>
              <li><a href="Productos.php"><i class="material-icons center">restaurant</i>Productos</a></li>
            </ul>
        </div>
      </nav>
      <table class="striped centered highlight responsive-table">
    <thead>
          <tr>
            <th>ID</th>
            <th>Barrio</th>
            <th>Calle</th>
            <th>Numero</th>
            <th>Piso</th>
            <th>Depto</th>
            <th>Acciones</th>
          </tr>
        </thead>

    <?php
      require_once("db.php");
      $query = "SELECT `Destinos_ID`,`Destinos_Barrio`, `Destinos_Calle`, `Destinos_Numero`, `Destinos_Piso`, `Destinos_Depto`, `Destinos_ID` FROM `Destinos`";
      $rsDATA = $DBengine -> query($query);
            
      while ($register = $rsDATA -> fetch_row()) {
        echo " <tr>
            <td>".$register[0]."</td>"
            ."<td>".$register[1]."</td>"
            ."<td>".$register[2]."</td>"
            ."<td>".$register[3]."</td>"
            ."<td>".$register[4]."</td>"
            ."<td>".$register[5]."</td>"
            ."<td><a class='waves-effect waves-light btn' href='editarDestino.php? Destinos_ID=".$register[6]."'>Editar</a>
                            <a class='waves-effect waves-light btn' href='eliminarDestino.php? Destinos_ID=".$register[6]."' onClick='return confirm(`¿Está seguro que desea eliminar este registro?`)'>Eliminar</a></td>"
          ."</tr>";
      }
    ?>
  </table>
  <p class="center-align">
    <a class="btn-floating btn-large waves-effect waves-light red" href="addDestino.php"><i class="material-icons">add</i></a>
  </p>
</body>
</html>