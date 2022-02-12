<?php

// Author       : Danu Andrean
// Maintenance  : Danu andrean
// year         : 2020 - 2022

include 'database.php';
session_start();

function query($table){
    $database = database::connect();

    $data = mysqli_query($database,"SELECT * FROM $table");

    $rows   =[];
    while($row=mysqli_fetch_assoc($data)){
        $rows[]=$row;
    }
    // var_dump ($rows);
    return $rows;
} 

function query_search($val,$table){
    $database = database::connect();

    $data = mysqli_query($database,"SELECT * FROM $table WHERE time like '%".$val."%' ");
    
    $rows   =[];
    while($row=mysqli_fetch_assoc($data)){
        $rows[]=$row;
    }
    // var_dump ($rows);
    return $rows;
}

function show_all($rows){
    $sensor1 =[];
    $sensor2 =[];
    $sensor3 =[];
    $sensor4 =[];
    $sensor5 =[];

    $time   =[];
    $count  =0;

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
    return $container = array(
        'sensor1' =>$sensor1,
        'sensor2' =>$sensor2,
        'sensor3' =>$sensor3,
        'sensor4' =>$sensor4,
        'sensor5' =>$sensor5,
        'time' =>$time,
        'count' =>$count,
    );
}

function average($rows){
    $day_arr = [];
    $temp_sensor1 = [];
    $temp_sensor2 = [];
    $temp_sensor3 = [];
    $temp_sensor4 = [];
    $temp_sensor5 = [];
    $data_time    = [];
  
    foreach($rows as $row){
        $time_data = strtotime($row["time"]);
        $day = date("d", $time_data);
        
        
        if (!in_array($day,$day_arr)){
            if(!empty($day_arr)){
                $sensor1[]  = max($temp_sensor1);
                $sensor2[]  = max($temp_sensor2);
                $sensor3[]  = max($temp_sensor3);
                $sensor4[]  = max($temp_sensor4);
                $sensor5[]  = max($temp_sensor5);
                $time[]     = end($data_time);
            }
            $day_arr []   = $day;
            $temp_sensor1 = [];
            $temp_sensor2 = [];
            $temp_sensor3 = [];
            $temp_sensor4 = [];
            $temp_sensor5 = [];
            
        }
        $temp_sensor1[] = $row["sensor1"];
        $temp_sensor2[] = $row["sensor2"];
        $temp_sensor3[] = $row["sensor3"];
        $temp_sensor4[] = $row["sensor4"];
        $temp_sensor5[] = $row["sensor5"];
        $data_time[]    = date("d-M-Y", $time_data);
    }
    // var_dump($sensor1);
    /*
    * Last day
    *
    */
  
    $container1= [];
    $container2= [];
    $container3= [];
    $container4= [];
    $container5= [];
  
    $container_time=[];
    foreach($rows as $row){
        $time_data = strtotime($row["time"]);
        $day = date("d-M-Y", $time_data);
    
        // var_dump(end($data_time));
        // exit();
        if(end($data_time) == $day){
            
            $container1[] = $row["sensor1"];
            $container2[] = $row["sensor2"];
            $container3[] = $row["sensor3"];
            $container4[] = $row["sensor4"];
            $container5[] = $row["sensor5"];
            $container_time[] = date("d-M-Y", $time_data);
            
        }
    }
    //last day algoritm
    if(!empty($container1)){
        $sensor1[]  = max($container1);
        $sensor2[]  = max($container2);
        $sensor3[]  = max($container3);
        $sensor4[]  = max($container4);
        $sensor5[]  = max($container5);
        $time[]     = end($data_time);
    }

    return $container = array(
        'sensor1' =>$sensor1,
        'sensor2' =>$sensor2,
        'sensor3' =>$sensor3,
        'sensor4' =>$sensor4,
        'sensor5' =>$sensor5,
        'time' =>$time,
    );
}

function insert($sensor1, $sensor2, $sensor3, $sensor4, $sensor5){
    $database = database::connect();
    $status = mysqli_query(
        $database, "INSERT into 
            tb_sensor(sensor1, sensor2, sensor3, sensor4, sensor5)
            values($sensor1, $sensor2, $sensor3, $sensor4, $sensor5)");
    return $status;
}
function update($btn1,$btn2,$btn3,$btn4){
    $database = database::connect();
    $result = mysqli_query($database,"SELECT * FROM respon");
    $count = 0;
    //  > 0
    foreach($result as $result_count){
        $count++;
    }
    if($count >0){
        // var_dump("update");
        $status = mysqli_query(
            $database, " UPDATE respon SET 
            value1=$btn1,value2=$btn2,value3=$btn3,value4=$btn4 WHERE 1");
    }
    else{
        // var_dump("insert");
        $status = mysqli_query(
            $database, "INSERT INTO respon(value1, value2, value3, value4)
            VALUES($btn1,$btn2,$btn3,$btn4)");
    }
    if($status){
        $_SESSION["status"] = "succes";
    }
    else{
        $_SESSION["status"] = "failed";
    }

	
    return $status;
}

?>