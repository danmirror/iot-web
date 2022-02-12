<?php
    include '../config.php';
    
    $data = mysqli_query($konek,"SELECT * FROM tb_sensor");

    $sensor1=[];
    $sensor2=[];
    $sensor3=[];
    $sensor4=[];
    $sensor5=[];
    
    $time   = [];
    $count  = 0;
    $rows   = [];
    while($row=mysqli_fetch_assoc($data)){
        $rows[]=$row;
    }
    // var_dump($rows);
    // exit;
    foreach($rows as $row){
        $time_data = strtotime($row["time"]);
        $sensor1[] = $row["sensor1"];
        $sensor2[] = $row["sensor2"];
        $sensor3[] = $row["sensor3"];
        $sensor4[] = $row["sensor4"];
        $sensor5[] = $row["sensor5"];

        // $time[] = date("H:i d-M-Y", $time_data);
        // $time[] = date("H:i d-M-Y", $time_data+1*60*60);
        $time[] = date("H:i d-M-Y", $time_data);
        $count +=1;
        // var_dump($time);
    }

    $container = array(
        "labels" => $time,
        "data" => [
            'sensor1' =>$sensor1,
            'sensor2' =>$sensor2,
            'sensor3' =>$sensor3,
            'sensor4' =>$sensor4,
            'sensor5' =>$sensor5,
            'end_sensor1' =>end($sensor1),
            'end_sensor2' =>end($sensor2),
            'end_sensor3' =>end($sensor3),
            'end_sensor4' =>end($sensor4),
            'end_sensor5' =>end($sensor5),
        ]
    );
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($container);
?>