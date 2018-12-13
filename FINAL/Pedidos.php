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
              <li class="active"><a href="Pedidos.php"><i class="material-icons center">add_shopping_cart</i>Pedidos</a></li>
              <li><a href="Canales.php"><i class="material-icons center">public</i>Canales</a></li>
              <li><a href="Destinos.php"><i class="material-icons center">room</i>Destinos</a></li>
              <li><a href="Productos.php"><i class="material-icons center">restaurant</i>Productos</a></li>
            </ul>
        </div>
      </nav>

      <table class="striped centered highlight responsive-table">
    <thead>
          <tr>
            <th>Numero de pedido</th>
            <th>Fecha</th>
            <th>Producto</th>
            <th>Precio unitario</th>
            <th>Cantidad</th>
            <th>Monto Final</th>
            <th>Canal</th>
            <th>Destino_ID</th>
            <th>Acciones</th>
          </tr>
        </thead>
  
    <?php
            require_once("db.php");
            $query = "SELECT DISTINCT Pedidos.`Pedidos_ID` ,Pedidos.`Pedidos_Fecha`,Productos.`Productos_Nombre`,Productos.`Productos_Precio`, Combos.`Combos_Cantidad`, Pedidos.`Pedidos_Monto`, Canales.`Canales_Nombre`, Pedidos.`Pedidos_ID`, Pedidos.`Pedidos_Destinos_ID` FROM `Pedidos`, `Productos`, `Canales`, `Combos`, `Destinos` WHERE Combos.Combos_Pedidos_ID = Pedidos.Pedidos_ID AND Productos.Productos_ID = Combos.Combos_Productos_ID AND Canales.Canales_id = Pedidos.Pedidos_Canales_ID ORDER BY Pedidos.`Pedidos_ID`";
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
                        ."<td>".$register[8]."</td>"
                        ."<td><a class='waves-effect waves-light btn' href='editarPedido.php? Pedidos_ID=".$register[7]."'>Editar</a>
                            <a class='waves-effect waves-light btn' href='eliminarPedido.php? Pedidos_ID=".$register[7]."' onClick='return confirm(`¿Está seguro que desea eliminar este registro?`)'>Eliminar</a></td>"
                    ."</tr>";
            }
        ?>
  </table>  
<p class="center-align">
    <a class="btn-floating btn-large waves-effect waves-light red" href="addPedido.php"><i class="material-icons">add</i></a>
  </p>
</body>
</html>