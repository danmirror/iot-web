<?php
	include 'function.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sensor1 =$_POST["sensor1"];
		$sensor2 =$_POST["sensor2"];
		$sensor3 =$_POST["sensor3"];
		$sensor4 =$_POST["sensor4"];
		$sensor5 =$_POST["sensor5"];
		$save  = insert($sensor1, $sensor2, $sensor3, $sensor4, $sensor5);
		if($save){
			echo "post done";
		}
		else{
			echo "post failed";
		}
	}
	else{
		$sensor1 =$_GET["sensor1"];
		$sensor2 =$_GET["sensor2"];
		$sensor3 =$_GET["sensor3"];
		$sensor4 =$_GET["sensor4"];
		$sensor5 =$_GET["sensor5"];
		// var_dump($sensor5);
		$save  = insert($sensor1, $sensor2, $sensor3, $sensor4, $sensor5);
		if($save){
			echo "get done";
		}
		else{
			echo "get failed";
		}
   }
?>