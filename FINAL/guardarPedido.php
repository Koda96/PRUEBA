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
    $Destino = $_POST["Destino"];
    $Canal = $_POST["Canal"];
    $FormaPago = $_POST["FormaPago"];
    $Monto = $Producto_Precio * $Cantidad;

    $query = "INSERT INTO Pedidos(Pedidos_ID, Pedidos_Monto, Pedidos_Fecha, Pedidos_Canales_ID,Pedidos_Destinos_ID,Pedidos_FormaPago_ID) VALUES (NULL,'$Monto', '$Fecha', '$Canal','$Destino','$FormaPago' )";

    $resultado = mysqli_query($DBengine, $query);

    //$Pedidos_ID = mysql_query ("SELECT Pedidos_ID FROM `Productos` ORDER BY Pedidos_ID asc limit 1");

    //$Pedidos_ID = mysql_query ("SELECT @@identity AS id");

     $query = "SELECT * FROM `Pedidos` ORDER BY Pedidos.Pedidos_ID DESC";

      $rsDATA = $DBengine -> query($query);

      $register = $rsDATA -> fetch_array();

      $Pedidos_ID = $register[0];

   $query = "INSERT INTO Combos(Combos_ID, Combos_Pedidos_ID, Combos_Productos_ID, Combos_Cantidad) VALUES (NULL,'$Pedidos_ID', '$Producto_ID', '$Cantidad')";

    $resultado = mysqli_query($DBengine, $query);
    if (!$resultado) { ?>
      <div class="row">
          <div class="col s12 m6">
              <div class="card blue-grey darken-1 hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Registro fallido</span>
                    <p>Ha ocurrido un error al registrar el pedido en la agenda de contactos.</p>
                </div>
                <div class="card-action">
                    <a href="Pedidos.php">Volver</a>
                </div>
              </div>
          </div>
        </div>
    <?php
    } else{ ?>
      <div class="row">
          <div class="col s12 m6">
              <div class="card blue-grey darken-1 hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Registro exitoso</span>
                    <p>El registro ha sido exitoso, para continuar haga click al enlace de abajo.</p>
                </div>
                <div class="card-action">
                    <a href="Pedidos.php">Aceptar</a>
                </div>
              </div>
          </div>
        </div>
    <?php }

    mysqli_close($DBengine);
  ?>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
  </html>