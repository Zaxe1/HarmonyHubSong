<?php
function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try
    {
        $conn = new PDO("mysql:host=$servername;port=3306;dbname=Employee_db76;","$username","$password");
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $conn;
        
    }
    catch(PDOException $e)
    {
        echo $e;
    }
}
?>