<?php
  //error_reporting(0);
  include("connection.php");
  include("functions.php");
  $dbconnect = mysqli_connect($host,$user,$pass,$dbs);
?>
<!--Connection metaData -->
<html lang="en" dir="ltr">
<?php include("snipescodes/metadata.php"); ?>
<!--Fonts-->
<link rel="stylesheet" href="css/indexcss.css"/>
<!--Fonts-->
<body>

  <?php include("snipescodes/nav.php");?>
  <?php include("snipescodes/exchanges.php");?>
  <?php include("snipescodes/cardDoc.php");?>
  <?php include("snipescodes/footer.php"); ?>
</body>
</html>