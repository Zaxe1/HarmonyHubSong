<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once("dbconnect.php");
$conn=connect();
if(isset($_GET['pid'])){

try{
    $sql = "delete from product where pid=?";
    $stmt=$conn->prepare($sql);
    $stmt->execute([$_GET['pid']]);
    $_SESSION['deleteSuccess']="successfully deleted";
    header("Location:viewProduct.php");


}catch(PDOException $e){
    echo $e;
}
   
}



















?>