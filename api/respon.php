<?php
    include '../config.php';
    $data = mysqli_query($konek,"SELECT * FROM respon");
    
    $rows=[];
	while($row=mysqli_fetch_assoc($data)){
		$rows[]=$row;
    }
    foreach($rows as $row){
        $contain1 = $row['value1'];
        $contain2 = $row['value2'];
        $contain3 = $row['value3'];
        $contain4 = $row['value4'];
    }
    $containers = array(
        "btn1" => $contain1,
        "btn2" => $contain2,
        "btn3" => $contain3,
        "btn4" => $contain4,
    );

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($containers);
?>
