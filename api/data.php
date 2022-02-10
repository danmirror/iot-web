<?php
    include '../config.php';
    
    $data = mysqli_query($konek,"SELECT * FROM tb_sensor");

    $suhu1=[];
    $suhu2=[];
    $kelembaban1=[];
    $kelembaban2=[];
    $gas=[];
    
    $time = [];
    $count=0;
    $rows=[];
    while($row=mysqli_fetch_assoc($data)){
        $rows[]=$row;
    }
    // var_dump($rows);
    // exit;
    foreach($rows as $row){
        $time_data = strtotime($row["time"]);
        $suhu1[]        = $row["suhu1"];
        $suhu2[]        = $row["suhu2"];
        $kelembaban1[]  = $row["kelembaban1"];
        $kelembaban2[]  = $row["kelembaban2"];
        $gas[]          = $row["gas"];

        // $time[] = date("H:i d-M-Y", $time_data);
        // $time[] = date("H:i d-M-Y", $time_data+1*60*60);
        $time[] = date("H:i d-M-Y", $time_data);
        $count +=1;
        // var_dump($time);
    }

    $container = array(
        "labels" => $time,
        "data" => [
            'suhu1'         =>$suhu1,
            'suhu2'         =>$suhu2,
            'kelembaban1'   =>$kelembaban1,
            'kelembaban2'   =>$kelembaban2,
            'gas'           =>$gas,
            'end_suhu1'         =>end($suhu1),
            'end_suhu2'         =>end($suhu2),
            'end_kelembaban1'   =>end($kelembaban1),
            'end_kelembaban2'   =>end($kelembaban2),
            'end_gas'           =>end($gas),
        ]
    );
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($container);
?>