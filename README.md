### web template for IOT
> Basic web API for IOT sensor 

### Requirement
- [x] local web server (apache, NginX,etc)
- [x] php 7
- [x] sass for style
- [x] mysql

### Instalation
setup your database using iot_table.sql

### Package rest api

    data1 = 90

you can add more data with change in connect.php and change in sql


api 

    data1 = 90
    data2 = 90
    data3 = 90

connect.php

    $var1 = $_GET['data1'];
    $var2 = $_GET['data2'];
    $var3 = $_GET['data3'];
    mysqli_query($konek, "INSERT INTO iot_table(data_sensor1, data_sensor2, data_sensor3) VALUES('$var1','$var2','$var3')");

iot_table.sql

    CREATE TABLE `iot_table` (
    `id` int(10) NOT NULL,
    `data_sensor1` varchar(20) NOT NULL,
    `data_sensor2` varchar(20) NOT NULL,
    `data_sensor3` varchar(20) NOT NULL,
    `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


### Author
> <a href="https://me-danuandrean.github.io/">Danu andrean</a>
