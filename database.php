<?php
// Author       : Danu Andrean
// Maintenance  : Danu andrean
// year         : 2020 - 2022

class database{

    public static $servername = "localhost";
    public static $database = "iot_web";
    public static $username = "root";
    public static $password = "dnandev!";
    
    static public function connect(){
        $data = mysqli_connect (
            self::$servername,
            self::$username,
            self::$password,
            self::$database);
        return $data;
    }
}
// $static = new database;
// var_dump($static->connect());

?>
