<?php


function update($konek,$btn1,$btn2,$btn3,$btn4){

    $result = mysqli_query($konek,"SELECT count(*) FROM respon");
    if($result >0){
        $status = mysqli_query(
            $konek, " UPDATE respon SET value1=$btn1,value2=$btn2,value3=$btn3,value4=$btn4 WHERE 1");
    }
    else{
        $status = mysqli_query(
            $konek, "INSERT INTO respon(value1, value2, value3, value4)VALUES($btn1,$btn2,$btn3,$btn4)");
    }

}

function respon(){
    
}

?>