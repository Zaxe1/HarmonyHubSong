<?php
function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try
    {
        $conn = new PDO("mysql:host=$servername;port=3306;dbname=harmony;","$username","$password");
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $conn;
        
    }
    catch(PDOException $e)
    {
        echo $e;
    }
}
?>