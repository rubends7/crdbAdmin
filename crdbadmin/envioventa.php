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
          <form>
            <div class="container">
              <!--<h3 id="textcontacto">GRACIAS POR ESCRIBIRNOS A LA BREVEDAD TE CONTESTAREMOS</h3>-->
              <?php
                //Conectamos con mailingdb para cargar la tabla con los datos de los usuarios que escriben
                //Array POST
                $cbotipocerveza=$_POST['cbotipocerveza'];
                $loteventa=$_POST['loteventa'];
                $litrosventa=$_POST['litrosventa'];
                $clienteventa=$_POST['clienteventa'];
                $fechaventa=$_POST['fechaventa'];
                $pesosventa=$_POST['pesosventa'];
                $pesosdebeventa=$_POST['pesosdebeventa'];

                //Conexion MYSQL
                require("conexion.php");

                //Subir el nuevo usuario
                $query="INSERT INTO ventas VALUES (0,'$cbotipocerveza','$loteventa','$litrosventa','$clienteventa','$fechaventa','$pesosventa','$pesosdebeventa')";
                $nuevoUsuario=mysqli_query($conexion,$query) or die("error en la consulta".mysqli_error($conexion));
              ?>
            </div>
            <div class="container centrarheader wow pulse">
              <h1>OPERACION REALIZADA CON EXITO</h1>
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
  
</body>

</html>
