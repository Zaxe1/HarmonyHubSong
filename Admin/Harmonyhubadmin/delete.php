<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once("dbconnect.php");
$conn=connect();
if(isset($_GET['id'])){

try{
    $sql = "delete from admin where id=?";
    $stmt=$conn->prepare($sql);
    $stmt->execute([$_GET['id']]);
    $_SESSION['deleteSuccess']="successfully deleted";
    header("Location:profile.php");


}catch(PDOException $e){
    echo $e;
}
   
}



















?>