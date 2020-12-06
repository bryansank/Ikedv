<?php
  include("connection.php");
  $dbconnect = mysqli_connect($host,$user,$pass,$dbs);
  //
  $id = $_GET['id'];
  $select = "DELETE FROM comment WHERE id_comment = '".$id."' ";
  $result = mysqli_query($dbconnect, $select);
  header("location: testview.php");
