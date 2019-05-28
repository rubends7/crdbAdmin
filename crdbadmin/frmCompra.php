<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <!--bootstrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--css-->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/animate.css">
  <!--js-->
  <script src="js/wow.min.js" type="text/javascript"></script>
  <script>
    new WOW().init();
  </script>

</head>

<body>
  <div>
    <div class="container positiontitle">
      <h1>Formulario de Compra</h1>
      <h5><a href="index.html">VOLVER</a></h5>
    </div>
    <div>
      <div>
        <div class="container">
          <form action="enviocompra.php" method="POST">
              <div class="container row">
                <div class="form-group col-12">
                  <label for="fechacompra">Fecha</label>
                  <input type="date" class="form-control" id="fechacompra" placeholder="dd/mm/aaaa" name="fechacompra">
                  <small id="fechacompraHelp" class="form-text text-muted">Fecha de compra.</small>
                </div>
                <div class="form-group col-12">
                  <label for="productocompra">Compra</label>
                  <input type="text" class="form-control" id="productocompra" placeholder="Tipo producto" name="productocompra">
                  <small id="compraHelp" class="form-text text-muted">Tipo de producto que se compra.</small>
                </div>
                <div class="form-group col-12">
                  <label for="montocompra">Monto Compra</label>
                  <input type="text" class="form-control" id="montocompra" placeholder="$" name="montocompra" onkeypress="return numeros(event)">
                  <small id="montocompraHelp" class="form-text text-muted">Monto de la compra en pesos.</small>
                </div>
                <div class="form-group col-12">
                  <label for="tipocompra">Tipo Compra</label>
                  <select class="form-control" id="tipocompra" name="cbotipocompra">
                    <?php
                    /*Conexion MySql*/
                      require("conexion.php");
                    /*Consulta a la base de datos*/
                      $query="SELECT idtipocompra, tipocompra FROM tipocompras";
                      $resultado = mysqli_query($conexion,$query) or die("Error en la consulta".mysql_error($conexion));
                      if ($resultado)
                      while($renglon = mysqli_fetch_array($resultado))
                      {
                      $valor=$renglon['tipocompra'];
                      $idvalor=$renglon['idtipocompra'];
                      echo '<option value="'.$idvalor.'">'.$valor."</option>\n";
                      }
                      mysqli_close($link);
                    ?>
                  </select>
                  <small id="tipocompraHelp" class="form-text text-muted">Si es compra por inversion o de caja chica.</small>
                </div>
                <div class="form-group col-12">
                  <label for="compradorcompra">Comprador</label>
                  <select class="form-control" id="cbocomprador" name="cbocomprador">
                    <?php
                    /*Conexion MySql*/
                      require("conexion.php");
                    /*Consulta a la base de datos*/
                      $query="SELECT idcomprador, comprador FROM compradores";
                      $resultado = mysqli_query($conexion,$query) or die("Error en la consulta".mysql_error($conexion));
                      if ($resultado)
                    /*Cargo el cbobox*/
                      while($renglon = mysqli_fetch_array($resultado))
                      {
                      $valor=$renglon['comprador'];
                      $idvalor=$renglon['idcomprador'];
                      echo '<option value="'.$idvalor.'">'.$valor."</option>\n";
                      }
                      mysqli_close($link);
                    ?>
                  </select>
                  <small id="mecherosHelp" class="form-text text-muted">Quien hace la compra.</small>
                </div>
              </div>
            <div class="container submitbutton">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
  
  <!--Validacion de numeros en campo monto-->
  <script>
    function numeros(e){
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " 0123456789";
      especiales = [8,37,39,46];
   
      tecla_especial = false
      for(var i in especiales){
        if(key == especiales[i]){
        tecla_especial = true;
        break;
            } 
        }
   
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
          return false;
    }
  </script>

</body>

</html>
