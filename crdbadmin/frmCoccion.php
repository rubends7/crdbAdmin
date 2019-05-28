<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Place favicon.ico in the root directory -->
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <link rel="shortcut icon" href="img/prayIcon.ico">

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
      <div>
        <h1>Fromulario de Coccion</h1>
      </div>
      <div>
        <h5><a href="index.html">VOLVER</a></h5>
      </div>
    </div>
    <div>
      <div>
        <div class="container">
          <!--Formulario de tres etapas Olla de licor/maceración/hervido-->
          <form action="enviococcion.php" method="POST">
            <div class="container row">
              <div class="form-group col-lg-4 col-sm-4">
                <label for="fechacoccion">Fecha</label>
                <input type="date" class="form-control" id="fechacoccion" placeholder="dd/mm/aaaa" name="fechacoccion">
              </div>
              <div class="form-group col-lg-4 col-sm-4">
                <label for="numerolote">Número de Lote</label>
                <input type="text" class="form-control" id="numerolote" name="numerolote" onkeypress="return numeros(event)">
              </div>
              <div class="form-group col-lg-4 col-sm-4">
                <label for="idtipocerveza">Tipo Cerveza</label>
                <select class="form-control" id="idtipocerveza" name="idtipocerveza">
                    <?php
                    /*Conexion MySql*/
                      require("conexion.php");
                    /*Consulta a la base de datos*/
                      $query="SELECT idtipocerveza, tipocerveza FROM tipocervezas";
                      $resultado = mysqli_query($conexion,$query) or die("Error en la consulta".mysqli_error($conexion));
                      if ($resultado)
                      while($renglon = mysqli_fetch_array($resultado))
                      {
                      $valor=$renglon['tipocerveza'];
                      $idvalor=$renglon['idtipocerveza'];
                      echo '<option value="'.$idvalor.'">'.$valor."</option>\n";
                      }
                      mysqli_close($link);
                    ?>
                  </select>
              </div>
            </div>
          <!--Olla de licor-->
            <h4>Olla de licor</h4>
              <div class="container row">
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="accionamecheros">Acciona mecheros</label>
                  <input type="time" class="form-control" id="accionamecheros" placeholder="hs." name="accionamecheros">
                  <small id="mecherosHelp" class="form-text text-muted">Hora en la que se prenden los mecheros.</small>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="litrosagua">Litros de agua</label>
                  <input type="text" class="form-control" id="litrosagua" aria-describedby="" placeholder="lts." name="litrosagua" onkeypress="return numeros(event)">
                  <small id="litrosHelp" class="form-text text-muted">Litros de agua que seran destinados a maceración de cereal.</small>
                </div>
              </div>
          <!--Olla de macerado-->
            <h4>Olla de Maceración</h4>
              <div class="container row">
                <div class="form-group col-lg-12 col-sm-12">
                  <label for="kiloscereal">Kilos de cereal</label>
                  <input type="text" class="form-control" id="kiloscereal" aria-describedby="" placeholder="kg." name="kiloscereal" onkeypress="return numeros(event)">
                  <small id="kilosHelp" class="form-text text-muted">Kilos de cereal para macerar(Relación 3/1).</small>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="tipocereal">Tipo de Cereal</label>
                    <div>
                      <input class="form-control form-control-sm" type="text" name="tipocereala">
                      <br>
                      <input class="form-control form-control-sm" type="text" name="tipocerealb">
                      <br>
                      <input class="form-control form-control-sm" type="text" name="tipocerealc">
                    </div>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="tipocereal">Peso (kg.)</label>
                    <div>
                      <input class="form-control form-control-sm" type="text" name="kilosa" onkeypress="return numeros(event)">
                      <br>
                      <input class="form-control form-control-sm" type="text" name="kilosb" onkeypress="return numeros(event)">
                      <br>
                      <input class="form-control form-control-sm" type="text" name="kilosc" onkeypress="return numeros(event)">
                    </div>
                </div>
              </div>
              <div class="container row">
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="horamacera">Hora de macerado</label>
                  <input type="time" class="form-control" id="horamacera" aria-describedby="" placeholder="hs." name="horamacera">
                  <small id="horasHelp" class="form-text text-muted">Hora en la que arranca el macerado.</small>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="tempagua">Temperatura de Agua</label>
                  <input type="text" class="form-control" id="tempagua" aria-describedby="" placeholder="°C" name="tempagua" onkeypress="return numeros(event)">
                  <small id="aguaHelp" class="form-text text-muted">Temperatura de agua en macerado.</small>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="macerareposo">Macera en reposo</label>
                  <input type="time" class="form-control" id="macerareposo" aria-describedby="" placeholder="hs." name="macerareposo">
                  <small id="horasHelp" class="form-text text-muted">Hora en que se macera en reposo para formar el manto filtrante.</small>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="tempreposo">Temperatura de mosto</label>
                  <input type="text" class="form-control" id="tempreposo" aria-describedby="" placeholder="°C" name="tempreposo" onkeypress="return numeros(event)">
                  <small id="aguaHelp" class="form-text text-muted">Temperatura de mosto en macerado.</small>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="macerarecirculado">Macera en recirculado</label>
                  <input type="time" class="form-control" id="macerarecirculado" aria-describedby="" placeholder="hs." name="macerarecirculado">
                  <small id="horasHelp" class="form-text text-muted">Hora en que se macera con recirculado.</small>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="temprecirculado">Temperatura en recirculado</label>
                  <input type="text" class="form-control" id="temprecirculado" aria-describedby="" placeholder="°C" name="temprecirculado" onkeypress="return numeros(event)">
                  <small id="aguaHelp" class="form-text text-muted">Temperatura de mosto en macerado.</small>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="densidado">Densidad Original</label>
                  <input type="text" class="form-control" id="densidado" aria-describedby="" placeholder="g/cm³" name="densidado" onkeypress="return numeros(event)">
                  <small id="densidadHelp" class="form-text text-muted">Densidad del mosto antes de cocción.</small>
                </div>
              </div>
          <!--Olla de hervido-->
            <h4>Olla de Hervido</h4>
            <!--trasvase-->
              <div class="container row">
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="horatrasvase">Hora de trasvase</label>
                  <input type="time" class="form-control" id="horatrasvase" placeholder="hs." name="horatrasvase">
                  <small id="hervidoHelp" class="form-text text-muted">Hora en la que se trasvasa el mosto para hervor.</small>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="litrosmosto">Litros de mosto</label>
                  <input type="text" class="form-control" id="litrosmosto" aria-describedby="" placeholder="lts." name="litrosmosto" onkeypress="return numeros(event)">
                  <small id="hervidoHelp" class="form-text text-muted">Litros de mosto filtrado que se ponen a hervir.</small>
                </div>
              <!--Primer Lupulo-->
                <div class="form-group col-lg-3 col-sm-6">
                  <label for="horalupuloa">Hora de 1er adición</label>
                  <input type="time" class="form-control" id="horalupuloa" placeholder="hs." name="horalupuloa">
                  <small id="horasHelp" class="form-text text-muted">Hora en que se agrega 1er lúpulo.</small>
                </div>
                <div class="form-group col-lg-3 col-sm-6">
                  <label for="templupuloa">Temperatura de mosto</label>
                  <input type="text" class="form-control" id="templupuloa" aria-describedby="" placeholder="lts." name="templupuloa" onkeypress="return numeros(event)">
                  <small id="tempHelp" class="form-text text-muted">Temperatura de mosto para 1er adición de lúpulo.</small>
                </div>
                <div class="form-group col-lg-3 col-sm-6">
                  <label for="tipolupuloa">Tipo de lúpulo</label>
                  <input type="text" class="form-control" id="tipolupuloa" aria-describedby="" placeholder="" name="tipolupuloa">
                  <small id="lupuloHelp" class="form-text text-muted">Primer adición de lúpulo.</small>
                </div>
                <div class="form-group col-lg-3 col-sm-6">
                  <label for="pesolupuloa">Peso</label>
                  <input type="text" class="form-control" id="pesolupuloa" aria-describedby="" placeholder="gr." name="pesolupuloa" onkeypress="return numeros(event)">
                  <small id="lupuloHelp" class="form-text text-muted">Gramos de lúpulo.</small>
                </div>
              <!--Segundo lupulo-->
                <div class="form-group col-lg-3 col-sm-6">
                  <label for="horalupulob">Hora de hervido</label>
                  <input type="time" class="form-control" id="horalupulob" placeholder="hs." name="horalupulob">
                  <small id="horasHelp" class="form-text text-muted">Hora en que el mosto rompe hervor.</small>
                </div>
                <div class="form-group col-lg-3 col-sm-6">
                  <label for="templupulob">Temperatura de mosto</label>
                  <input type="text" class="form-control" id="templupulob" aria-describedby="" placeholder="lts." name="templupulob" onkeypress="return numeros(event)">
                  <small id="litrosHelp" class="form-text text-muted">Litros de mosto en cocción.</small>
                </div>
                <div class="form-group col-lg-3 col-sm-6">
                  <label for="tipolupulob">Tipo de lúpulo</label>
                  <input type="text" class="form-control" id="tipolupulob" aria-describedby="" placeholder="" name="tipolupulob">
                  <small id="lupuloHelp" class="form-text text-muted">Segunda adición de lúpulo.</small>
                </div>
                <div class="form-group col-lg-3 col-sm-6">
                  <label for="pesolupulob">Peso</label>
                  <input type="text" class="form-control" id="pesolupulob" aria-describedby="" placeholder="gr." name="pesolupulob" onkeypress="return numeros(event)">
                  <small id="lupuloHelp" class="form-text text-muted">Gramos de lúpulo.</small>
                </div>
              <!--tercer lupulo-->
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="apagamecheros">Apaga mecheros</label>
                  <input type="time" class="form-control" id="apagamecheros" placeholder="hs." name="apagamecheros">
                  <small id="mecherosHelp" class="form-text text-muted">Hora en la que se apagnan los mecheros.</small>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="litrosmostofinal">Litros de mosto final</label>
                  <input type="text" class="form-control" id="litrosmostofinal" aria-describedby="" placeholder="lts." name="litrosmostofinal" onkeypress="return numeros(event)">
                  <small id="litrosHelp" class="form-text text-muted">Litros de mosto final.</small>
                </div>
                <div class="form-group col-lg-3 col-sm-6">
                  <label for="horalupuloc">Hora de adición</label>
                  <input type="time" class="form-control" id="horalupuloc" placeholder="hs." name="horalupuloc">
                  <small id="horasHelp" class="form-text text-muted">Hora en que se adiciona el tercer lúpulo.</small>
                </div>
                <div class="form-group col-lg-3 col-sm-6">
                  <label for="templupuloc">Temperatura de mosto</label>
                  <input type="text" class="form-control" id="templupuloc" aria-describedby="" placeholder="lts." name="templupuloc" onkeypress="return numeros(event)">
                  <small id="tempHelp" class="form-text text-muted">Litros de mosto en cocción.</small>
                </div>
                <div class="form-group col-lg-3 col-sm-6">
                  <label for="tipolupuloc">Tipo de lúpulo</label>
                  <input type="text" class="form-control" id="tipolupuloc" aria-describedby="" placeholder="" name="tipolupuloc">
                  <small id="lupuloHelp" class="form-text text-muted">Tercera adición de lúpulo.</small>
                </div>
                <div class="form-group col-lg-3 col-sm-6">
                  <label for="pesolupuloc">Gramos de lúpulo</label>
                  <input type="text" class="form-control" id="pesolupuloc" aria-describedby="" placeholder="gr." name="pesolupuloc" onkeypress="return numeros(event)">
                  <small id="lupuloHelp" class="form-text text-muted">Gramos de lúpulo.</small>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                  <label for="densidadi">Densidad Inicial</label>
                  <input type="text" class="form-control" id="densidadi" aria-describedby="" placeholder="g/cm³" name="densidadi" onkeypress="return numeros(event)">
                  <small id="densidadHelp" class="form-text text-muted">Densidad del mosto luego de cocción.</small>
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
