<?php
  //error_reporting(0);
  include("connection.php");
  include("functions.php");
  include("snipescodes/fallosalvo.php");
  $error;
  $good;
  $dbconnect = mysqli_connect($host,$user,$pass,$dbs);
?>
<!--Connection metaData -->
<html lang="en" dir="ltr">
<?php include("snipescodes/metadata.php"); ?>
<!--Fonts-->
<link rel="stylesheet" href="css/indexcss.css"/>
<!--Fonts-->
<!--JAVASCRIPT-->
<script type="text/javascript" src="js/functions.js"></script>
<!--JAVASCRIPT-->
<body>

  <?php include("snipescodes/nav.php");?>
  <?php include("snipescodes/exchanges.php");?>

  <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitExchange']) && !empty($_POST['pesos_input']))
    {
      $functionInsertExchange = insertExchange($dbconnect,$error, $good);
      echo $functionInsertExchange;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitPackage']) && !empty($_POST['passport_input']))
    {
      $functionInsert = insertPackage($dbconnect,$error, $good);
      echo $functionInsert;
    }
  ?>

  <section id="cards">
    <div class="card">
      <div class="head-card">
        <!--IMG-->
        <img src="img/ikedv.png" alt="card1">
      </div>
      <div class="body-card">
        <center>
          <h2>Calcula tu envío</h2>
          <!-- JAVASCRIPT-->
          <form action="" id="form-boxDimen">
            <input type="number" name="widthContent" id="widthContent" placeholder="Ancho (cm)" class="check-text_input" step="any" maxlength="4" required /><br />
            <input type="number" name="heightContent" id="heightContent" placeholder="Altura (cm)" class="check-text_input" step="any" maxlength="4" required /><br />
            <input type="number" name="depthContent" id="depthContent" placeholder="Profundidad (cm)" class="check-text_input" step="any" maxlength="4" required /><br />
            <div class="button-card">
              <button type="button" onclick="getData();">Calcular</button>
              <span id="result"></span>
            </div>
          </form>
        </center>
      </div>
    </div>

    <section id="form-packages-input">
      <form id="update-form" action="" method="POST">
          <h1>Ingrese los datos</h1>
          <!---->
          <div class="form-pi-box">
            <div class="form-pi-package">
              <label for="code_input">
                <span>Introduzca su código de envío:</span>
              </label>

              <input type="text" class="check-text_input" name="code_input"
              placeholder="Codigo de envio" pattern="[0-9]+" maxlength="10" required />
            </div>

            <div class="form-pi-package">
              <label for="actual_input">
                <span>Introduzca posición actual:</span>
              </label>
                <input type="text" class="check-text_input" name="actual_input"
                placeholder="Posición actual" pattern="[A-Za-z0-9\s]+" maxlength="60" required />
            </div>
          </div>
          <br />
          <!---->
          <div class="form-pi-box">
            <div class="form-pi-package">
              <label for="remaining_input">
                <span>Introduzca puntos faltantes:</span>
              </label>
                <input type="text" class="check-text_input" name="remaining_input"
                placeholder="Puntos faltantes" pattern="[0-9]+" maxlength="11" required />
            </div>
            <div class="form-pi-package">
              <label for="place_input">
                <span>Introduzca lugar de entrega:</span>
              </label>
                <input type="text" class="check-text_input" name="place_input"
                placeholder="Lugar de entrega" pattern="[A-Za-z0-9\s]+" maxlength="60" required/>
            </div>
          </div>
          <br />
          <!---->
          <div class="form-pi-box">
            <div class="form-pi-package">
              <label for="receiver_input">
                <span>Introduzca retirador:</span>
              </label>
                <input type="text" class="check-text_input" name="receiver_input"
                placeholder="Retirador" pattern="[A-Za-z0-9\s]+" maxlength="60" required />
            </div>
              <div class="form-pi-package">
                <label for="passport_input">
                <span>Introduzca Pasaporte:</span>
                </label>
                <input type="text" class="check-text_package" name="passport_input"
                placeholder="Pasaporte" pattern="[0-9]+" maxlength="10" required />
              </div>
          </div>
          <br />
          <!---->
          <div class="form-pi-box">
            <div class="form-pi-package">
              <label for="price_input">
                <span>Introduzca precio:</span>
              </label>
              <input type="number" step="0.01" class="check-text_package" name="price_input"
                placeholder="Precio (.)" required />
            </div>
              <div class="form-pi-package">
                <label for="state_input">
                  <span>Introduzca Estado del paquete:</span>
                </label>
                <select name="state_input" class="check-text_package">
                  <option value="0">Entregado</option>
                  <option value="1">No entregado</option>
                </select>
              </div>
          </div>
          <!---->
          <div class="form-pi-box">
            <input id="form-pi-button" type="submit" name="submitPackage" value="Actulizar" for="update-form" />
          </div>
          <!---->
      </form>
    </section>
  </section>

  

  <section id="form-tasas-input">
      <form id="tasas-form" action="" method="POST">
        <h1>Ingrese Tasas de Cambio</h1>
        <br /><!---->
        <div class="form-pi-tasas">
          <label for="usd_input">
            <span>Introduzca Tasa DOLAR($):</span>
          </label>
          <input type="number" class="check-text_input" name="usd_input"
          placeholder="Tasa DOLAR($)" step="any" maxlength="11" required />
          <br />
        </div>
        <div class="form-pi-tasas">
          <label for="sol_input">
            <span>Introduzca Tasa SOL(S):</span>
          </label>
          <input type="number" class="check-text_input" name="sol_input"
          placeholder="Tasa SOL(S)" step="any" maxlength="11" required />
          <br />
        </div>
        <div class="form-pi-tasas">
          <label for="pesos_input">
            <span>Introduzca Tasa Pesos(COP):</span>
          </label>
          <input type="number" class="check-text_input" name="pesos_input"
          placeholder="Tasa Pesos(COP)" step="any" maxlength="11" required />
          <br />
        </div>
        <div class="form-pi-box">
          <input id="form-pi-button-tasas" type="submit" name="submitExchange" value="Actualizar" for="tasas-form" />
        </div>
      </form>
    <br />
  </section>

  <?php
    $allSelectTasas = viewExchange($dbconnect);

    echo "<h1 align='center'>TABLA TASAS</h1>";
    echo "
          <br/><br/><div class='container'>
            <table class='table table-dark-1 table-striped table-bordered'>

            <thead>
              <tr>

                <th>TASA DOLAR:</th>
                <th>TASA SOL:</th>
                <th>TASA PESO:</th>
                <th>FECHA DE ACTUALIZACION:</th>
              </tr>
            </thead>";
      ///////////////TABLE BODY ///////////////
      foreach($allSelectTasas as $row){
        echo "<tbody>";
          echo"<tr>";
            //echo"<td align='center'>". $row['id_exchange'] ."</td>";
            echo"<td align='center'>". $row['flUsd'] ." $". "</td>";
            echo"<td align='center'>". $row['flSol'] ." S". "</td>";
            echo"<td align='center'>". $row['flCop'] ." Peso" ."</td>";
            echo"<td align='center'>". $row['create_at'] ."</td>";
          echo"</tr>";
        echo "</tbody>";
      }
      ///////////////END TABLE BODY ///////////////
    echo"</table></div>";
    session_unset();
  ?>

  <?php
    $allSelectCode = viewPackage($dbconnect);

    echo "<h1 align='center'>TABLA PAQUETES</h1>";
    echo "
          <br/><br/><div class='container'>
            <table class='table table-dark-1 table-striped table-bordered'>

            <thead>
              <tr>
                <th>ID</th>
                <th>Codigo</th>
                <th>Posición actual</th>
                <th>Puntos faltantes</th>
                <th>Lugar de entrega</th>
                <th>Retirador:</th>
                <th>Pasaporte</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>";
      ///////////////TABLE BODY ///////////////
          foreach($allSelectCode as $row){
            echo "<tbody>";
              echo"<tr>";
                echo"<td align='center'>". $row['id_package'] ."</td>";
                echo"<td align='center'>". $row['strCode'] ."</td>";
                echo"<td align='center'>". $row['strActual_position'] ."</td>";
                echo"<td align='center'>". $row['intRemaining_point'] ."</td>";
                echo"<td align='center'>". $row['strPlace_delivery'] ."</td>";
                echo"<td align='center'>". $row['strReceiver'] ."</td>";
                echo"<td align='center'>". $row['strPassport'] ."</td>";
                echo"<td align='center'>". $row['flPrice'] . "$" ."</td>";
                if($row['intState'] == 0){
                  echo"<td align='center'>Entregado</td>";
                }else{
                  echo"<td align='center'>No entregado</td>";
                }
                /*echo"<td><a href='#?id=". $row['id_package']."'><font color='red'>Eliminar</font></a></td>";*/
                /*echo"<td><a href='testviewtwo.php?id=". $row['id_package']."'><font color='green'>Actualizar</font></a></td>";*/
                echo "<td align='center'><a href='testviewtwo.php?id=".$row['id_package']."'><font color='aqua'>ACTUALIZAR</font></a></td>";
              echo"</tr>";
            echo "</tbody>";
          }
      ///////////////END TABLE BODY ///////////////
          //echo"</thead>
        echo"</table>
      </div>";
      session_unset();
  ?>

  <?php

    $allSelectComment = viewComment($dbconnect);
    echo "<h1 align='center'>TABLA COMENTARIOS</h1>";
    echo "
      <br/><br/><div class='container'>
        <table class='table table-dark-1 table-striped table-bordered'>
          <thead>
            <tr>
              <th>ID:</th>
              <th>Nombre y Apellido:</th>
              <th>Email:</th>
              <th>Pais:</th>
              <th>Necesidad:</th>
              <th>Comentario:</th>
              <th>Acciones</th>
            </tr>
          </thead>
      ";
            ///////////////TABLE BODY ///////////////
            foreach($allSelectComment as $row){
              echo "<tbody>";
                echo "<tr>";
                  echo "<td align='center'>". $row['id_comment'] ."</td>";
                  echo "<td align='center'>". $row['strName_last'] ."</td>";
                  echo "<td align='center'>". $row['strEmail'] ."</td>";

                    //PAISES TODO: FUNCION
                    $functionContry = helperContry($row);
                    echo $functionContry;

                    //NECESIDAD
                    if($row['intNeed'] == 0){
                      echo"<td align='center'>Soporte</td>";
                    }elseif ($row['intNeed'] == 1) {
                      echo"<td align='center'>Casa de Cambio</td>";
                    }elseif ($row['intNeed'] == 2) {
                      echo"<td align='center'>Encomienda</td>";
                    }
                    //
                  echo "<td align='center'>". $row['strComment_client'] ."</td>";
                  echo "<td><a href='delete.php?id=". $row['id_comment']."'><font color='red'>Eliminar</font></a></td>";
                echo "</tr>";
              echo "</tbody>";
            }
            /////////////END TABLE BODY ///////////////
        echo "</table></div>";
     session_unset();
  ?>

  <?php include("snipescodes/footer.php"); ?>
</body>
</html>
