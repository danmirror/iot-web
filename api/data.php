<?php
    include '../function.php';

    $rows = query('tb_sensor');
    $data = show_all($rows);

    $container = array(
        "labels" => $data['time'],
        "data" => [
            'sensor1' =>$data['sensor1'],
            'sensor2' =>$data['sensor2'],
            'sensor3' =>$data['sensor3'],
            'sensor4' =>$data['sensor4'],
            'sensor5' =>$data['sensor5'],
            'end_sensor1' =>end($data['sensor1']),
            'end_sensor2' =>end($data['sensor2']),
            'end_sensor3' =>end($data['sensor3']),
            'end_sensor4' =>end($data['sensor4']),
            'end_sensor5' =>end($data['sensor5']),
        ]
    );
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($container);
?>