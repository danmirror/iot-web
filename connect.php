<?php
   include 'config.php';
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $var1 =$_POST["data1"];
      mysqli_query($konek, "INSERT INTO iot_table(data_sensor) VALUES('$var1')");
      echo "post";
   }
   else{
      $var1 = $_GET['data1'];
      mysqli_query($konek, "INSERT INTO iot_table(data_sensor) VALUES('$var1')");
      echo "get";
   }
?>