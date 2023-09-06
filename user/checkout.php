<?php
session_start();
require_once("dbconnect.php");
$conn=connect();
if(isset($_POST['submit']))
{
    $cart=$_SESSION['cart'];

    echo "in cart submit";
    try{
        $sql1="select pqty from product where pid=?";
        $sql="update product set pqty=? where pid=?";
        global $conn;
        $stmt1 =$conn->prepare($sql1);
        $qtyarr=array();
        foreach($cart as $id=>$qty){
            $stmt1->execute([$id]);
            $row=$stmt1->fetch();
            array_push($qtyarr,$row['pqty']);
        }
        print_r($qtyarr);
        $stmt=$conn->prepare($sql);
        $i=0;
        foreach($cart as $id=>$qty){
            $qt=$qtyarr[$i]-$qty;
            $i++;
            echo "quantity updates are $qt";
            $stmt->execute([$qt,$id]);
        }
        unset($_SESSION['cart']);
        $uid=$_SESSION['id'];
        $sql2="insert into sales (cid,sdate) values (?,?)";
        $sql3="insert into sales_item values (?,?,?)";
        $stmt2=$conn->prepare($sql2);
        $stmt3=$conn->prepare($sql3);
        $date=date("Y-m-d");
        $stmt2->execute([$uid,$date]);
        $lastID=$conn->lastInsertId();
        foreach($cart as $pid=>$qty){
            $stmt3->execute([$lastID,$pid,$qty]);
        }
       // echo" after cleaning session cart";
       header("Location:viewProductUser.php");
    }catch(PDOException $e)
    {
        echo $e;
    }
}
?>