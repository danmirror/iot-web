<?php
   include 'config.php';
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $suhu1 =$_POST["suhu1"];
      $kelembaban1 =$_POST["kelembaban1"];
      $suhu2 =$_POST["suhu2"];
      $kelembaban2 =$_POST["kelembaban2"];
      $gas =$_POST["gas"];
      mysqli_query($konek, "INSERT into tb_sensor(suhu1, kelembaban1, suhu2, kelembaban2, gas)values($suhu1, $kelembaban1, $suhu2, $kelembaban2, $gas)");
      echo "post";
   }
   else{
      $suhu1 =$_GET["suhu1"];
      $kelembaban1 =$_GET["kelembaban1"];
      $suhu2 =$_GET["suhu2"];
      $kelembaban2 =$_GET["kelembaban2"];
      $gas =$_GET["gas"];
      var_dump($gas);
      $save  = mysqli_query($konek, "INSERT into tb_sensor(suhu1, kelembaban1, suhu2, kelembaban2, gas)values($suhu1, $kelembaban1, $suhu2, $kelembaban2, $gas)");
      if($save){
         echo "get done";
      }
      else{
         echo "get failed";
      }
   }
?>