<?php
session_start();
if (isset($_POST['submit'])) {
  
    $pid = $_POST['pid'];
    if (isset($_SESSION['cart'])) { // adding item second or third or fourth time
        $cart = $_SESSION['cart'];
            if (array_key_exists($pid, $cart)) {  //check same pid exists";
                $cart[$pid] += 1;                    

            } 
            else {//there is no same previous selected pid.
                $cart[$pid] = 1;
            }
    } 
    else {// user select or add first item
        $cart = array();
        $cart[$pid] = 1;
    }
    $_SESSION['cart'] = $cart;// putting cart into session

  /* foreach($cart as $key => $val)
   {
        echo "$key => $val <br>";
   }*/
   header("Location:viewProductUser.php");
}