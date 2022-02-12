<?php
class database{

    public static $servername = "localhost";
    public static $database = "iot_farm";
    public static $username = "phpmyadmin";
    public static $password = "phpmyadmin";
    
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
