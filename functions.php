<?php
  session_start();

  function litleFunction($dbconnect){
    $exchangesClient = array();
    $selectDB = "SELECT * FROM exchange ORDER BY id_exchange DESC LIMIT 1";
    $executeQuery = mysqli_query($dbconnect,$selectDB);

    while ($row =
    mysqli_fetch_array($executeQuery)) {
    $exchangesClient[] = $row;
    }

    mysqli_free_result($executeQuery);

    return $exchangesClient;
  }

  function test($dbconnect, $error, $good){

  }

  function helperContry($rowComent){
    if($rowComent['intContry'] == 0){
      $soporte = "<td align='center'>Venezuela</td>";
      return $soporte;
    }
    if($rowComent['intContry'] == 1){
      $soporte = "<td align='center'>Colombia</td>";
      return $soporte;
    }
    if($rowComent['intContry'] == 2){
      $soporte = "<td align='center'>Peru</td>";
      return $soporte;
    }
    if($rowComent['intContry'] == 3){
      $soporte = "<td align='center'>USA</td>";
      return $soporte;
    }
    return null;
  }

  function readClient($dbconnect){
    $codeShipping = "";
    $duplicate = "";
    $_SESSION['boolvar'] = '0';

    if (isset($_POST['submitCheckCode'])){

      if (!empty($_POST['checkcode'])){
        $packages = array();
        $codeShipping = $_POST['checkcode'];

        $selectDB = "SELECT * FROM package WHERE strCode = '".$codeShipping."'";

        $executeQuery = mysqli_query($dbconnect,$selectDB);
        $duplicate = mysqli_num_rows($executeQuery);

        if($duplicate==0){
          echo "<nav class='naverror' style='border-bottom-color: red;'>
            <h1>
              <font color='black'>
                Ingrese un código valido.
              </font>
            </h1>
          </nav>";
          return null;
        }else{

          while ($row =
          mysqli_fetch_array($executeQuery)) {
          $packages[] = $row;
          }

          mysqli_free_result($executeQuery);
          $_SESSION['boolvar'] = '1';
          return $packages;
        }
    	}
    }
    //
  }

  function viewPackage($dbconnect){
      $packages = array();
      $select = "SELECT * FROM package ORDER BY intState = 0";
      $executeQuery = mysqli_query($dbconnect,$select);

      while ($row =
      mysqli_fetch_array($executeQuery)) {
      $packages[] = $row;
      }

      mysqli_free_result($executeQuery);

      return $packages;
  }

  function viewComment($dbconnect){
      $comments = array();
      $selectDB = "SELECT * FROM comment";
      $executeQuery = mysqli_query($dbconnect,$selectDB);

      while ($row =
      mysqli_fetch_array($executeQuery)) {
      $comments[] = $row;
      }

      mysqli_free_result($executeQuery);

      return $comments;
  }

  function viewExchange($dbconnect){
    $exchanges = array();
    $selectDB = "SELECT * FROM exchange ORDER BY id_exchange DESC LIMIT 2";
    $executeQuery = mysqli_query($dbconnect,$selectDB);

    while ($row =
    mysqli_fetch_array($executeQuery)) {
    $exchanges[] = $row;
    }

    mysqli_free_result($executeQuery);

    return $exchanges;
  }

  function insertPackage($dbconnect,$error, $good){
    $r;$p;$s;
    $code = "";$actual = "";$remaining = "";$place = "";$receiver = "";$passport = "";$price = "";$state = "";

    $code = $_POST['code_input'];
    $actual = $_POST['actual_input'];
    $r = $_POST['remaining_input'];//int
    $remaining = (int)$r;
    $place = $_POST['place_input'];
    $receiver = $_POST['receiver_input'];
    $passport = $_POST['passport_input'];
    $p = $_POST['price_input'];//int
    $price = (float)$p;
    $s = $_POST['state_input'];//int
    $state = (int)$s;

    if(!empty($_POST['code_input']) || !empty($_POST['actual_input']) || !empty($_POST['remaining_input']) || !empty($_POST['place_input']) || !empty($_POST['receiver_input']) || !empty($_POST['passport_input']) || !empty($_POST['price_input']))
    {
      //comment0, exchange1, package2
      $insertDB = "INSERT INTO package(strCode, strActual_position, intRemaining_point, strPlace_delivery, strReceiver, strPassport, flPrice, intState) VALUES ('".$code."','".$actual."','".$remaining."','".$place."','".$receiver."','".$passport."','".$price."','".$state."')";

      $executeQuery = mysqli_query($dbconnect,$insertDB);

      if ($executeQuery == true) {
        session_unset();
        session_destroy();
        return $good;
      }
    }
    session_unset();
    session_destroy();
    return $error;

  }

  function insertComment($dbconnect,$error, $good){
    $c;$n;
    $name = "";$email = "";$contry = "";$need = "";$comment="";

    $name = $_POST['name_last'];
    $email = $_POST['email'];
    $c = $_POST['contry'];//int
    $contry = (int)$c;
    $n = $_POST['need'];
    $need = (int)$n;
    $comment = $_POST['comment'];


    if(!empty($_POST['name_last']) || !empty($_POST['email']) || !empty($_POST['contry']) || !empty($_POST['need']) || !empty($_POST['comment']))
    {

      $insertDB = "INSERT INTO comment(strName_last, strEmail, intContry, intNeed, strComment_client) VALUES ('".$name."','".$email."','".$contry."','".$need."','".$comment."')";

      $executeQuery = mysqli_query($dbconnect,$insertDB);

      if ($executeQuery == true) {
        session_unset();
        session_destroy();
        return $good;
      }
    }
    session_unset();
    session_destroy();
    return $error;

  }

  function insertExchange($dbconnect,$error, $good){
    $u;$s;$c;
    $usd = ""; $sol ="";$cop = "";//$datenow = "";

    $u = $_POST['usd_input'];
    $usd = (float)$u;
    $s = $_POST['sol_input'];
    $sol = (float)$s;
    $c = $_POST['pesos_input'];
    $cop = (float)$c;
    //$datenow = $_POST['date_input'];

    if(!empty($_POST['usd_input']) || !empty($_POST['sol_input']) || !empty($_POST['pesos_input'])){
      $insertDB = "INSERT INTO exchange (flUsd, flSol, flCop) VALUES ('".$usd."', '".$sol."', '".$cop."')";

      $executeQuery = mysqli_query($dbconnect,$insertDB);
      if ($executeQuery) {
        session_unset();
        session_destroy();
        return $good;
      }
      session_unset();
      session_destroy();
      return $error;
    }
    session_unset();
    session_destroy();
    return $error;

  }

  function updatePackage($dbconnect,$error, $good){
    $r;$p;$s;$i;
    $code = "";$actual = "";$remaining = "";$place = "";$receiver = "";$passport = "";$price = "";$state = "";$id ="";

    $i = $_POST['id_input'];
    $id = (int)$i;
    $code = $_POST['code_input'];
    $actual = $_POST['actual_input'];
    $r = $_POST['remaining_input'];//int
    $remaining = (int)$r;
    $place = $_POST['place_input'];
    $receiver = $_POST['receiver_input'];
    $passport = $_POST['passport_input'];
    $p = $_POST['price_input'];//int
    $price = (float)$p;
    $s = $_POST['state_input'];//int
    $state = (int)$s;

    if(!empty($_POST['code_input']) || !empty($_POST['actual_input']) || !empty($_POST['remaining_input']) || !empty($_POST['place_input']) || !empty($_POST['receiver_input']) || !empty($_POST['passport_input']) || !empty($_POST['price_input']))
    {
      //comment0, exchange1, package2

      $updateDB = "UPDATE package SET strCode = '".$code."', strActual_position = '".$actual."', intRemaining_point = '".$remaining."', strPlace_delivery = '".$place."', strReceiver = '".$receiver."', strPassport = '".$passport."', flPrice = '".$price."', intState = '".$state."' WHERE id_package = '".$id."'";

      $executeQuery = mysqli_query($dbconnect,$updateDB);

      if ($executeQuery == true) {
        session_unset();
        session_destroy();

        return $good;
      }
    }
    session_unset();
    session_destroy();
    return $error;
  }
/*insert historical

      $queryzazo = "SELECT * FROM package ORDER BY id_package DESC LIMIT 1";
      $executeQuery2 = mysqli_query($dbconnect,$queryzazo);

      while ($row = mysqli_fetch_array($executeQuery2)){$var1[] = $row;}

      foreach($var1 as $row2){
        $u = $row2['id_package'];
        $uno = $u;
        $uno1 = $row2['code'];
        $uno2 = $row2['actual_position'];

        $insertHistorical = "INSERT INTO historical(typetrasac, id_package, code, actual_position) VALUES(2,'".$uno."','".$uno1."','".$uno2."',)";

        $executeQuery3 = mysqli_query($dbconnect,$insertHistorical);

      }


*/
