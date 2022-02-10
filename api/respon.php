<?php
    include '../config.php';
    $data = mysqli_query($konek,"SELECT * FROM respon");
    
    $rows=[];
	while($row=mysqli_fetch_assoc($data)){
		$rows[]=$row;
    }
    $container = [];
    foreach($rows as $row){
        $container[] = $row['value1'];
        $container[] = $row['value2'];
        $container[] = $row['value3'];
        $container[] = $row['value4'];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($container);
?>
