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

    sensor1 = 90

you can add more data with change in connect.php and change in sql


api 

    sensor1 = 90
    sensor2 = 90
    sensor3 = 90

connect.php

    $sensor1 =$_GET["sensor1"];
    $sensor2 =$_GET["sensor2"];
    $sensor3 =$_GET["sensor3"];
    $sensor4 =$_GET["sensor4"];
    $sensor5 =$_GET["sensor5"];

    $save  = insert($sensor1, $sensor2, $sensor3, $sensor4, $sensor5);


### Author
> <a href="https://me-danuandrean.github.io/">Danu andrean</a>
