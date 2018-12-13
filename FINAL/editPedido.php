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

       <?php
    require_once("db.php");

    $Producto_ID = $_POST["Producto"];
require_once("db.php");
          $query = "SELECT * FROM `Productos`";
          $rsDATA = $DBengine -> query($query);

          while ($register = $rsDATA -> fetch_array()){
            if ($register['Productos_ID']==$Producto_ID) {
                $Producto_Precio=$register['Productos_Precio'];
            }
        } 

    $Cantidad = $_POST["Cantidad"];
    $Fecha = $_POST["Fecha"];
    $Destino_ID = $_POST["Destino"];
    $Canal_ID = $_POST["Canal"];
    $FormaPago = $_POST["FormaPago"];
    $idPedido = $_POST["idPedido"];
    $Monto = $Producto_Precio * $Cantidad;

    $query = "UPDATE `Pedidos` SET `Pedidos_Monto` = '$Monto', `Pedidos_Fecha` = '$Fecha', `Pedidos_Canales_ID` = '$Canal_ID' , `Pedidos_Destinos_ID` = '$Destino_ID',`Pedidos_FormaPago_ID` = '$FormaPago'  WHERE `Pedidos`.`Pedidos_ID` = '$idPedido';";

    $resultado = mysqli_query($DBengine, $query);

     $query = "UPDATE `Combos` SET `Combos_Productos_ID` = '$Producto_ID', `Combos_Cantidad` = '$Cantidad' WHERE `Combos`.`Combos_Pedidos_ID` = '$idPedido';";

    $resultado = mysqli_query($DBengine, $query);

    if(!$resultado) { ?>
      <div class="row">
          <div class="col s12 m6">
              <div class="card blue-grey darken-1 hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Edición Fallida</span>
                    <p>No se ha podido editar el pedido correctamente.</p>
                </div>
                <div class="card-action">
                    <a href="Pedidos.php">Volver</a>
                </div>
              </div>
          </div>
        </div>
    <?php
    }else{ ?>
      <div class="row">
          <div class="col s12 m6">
              <div class="card blue-grey darken-1 hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Edición exitosa</span>
                    <p>El pedido se ha editado correctamente.</p>
                </div>
                <div class="card-action">
                    <a href="Pedidos.php">Volver</a>
                </div>
              </div>
          </div>
        </div>
    <?php }

    mysqli_close($DBengine);

    ?>

</body>
</html>