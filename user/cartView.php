<?php

session_start();


require_once("dbconnect.php");
$conn =  connect();
function productDetail($id)
{
    global $conn;
    $sql = "select * from product where pid=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $product = $stmt->fetch();
    return $product;
}
try {


    $sql = "select * from category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll();
} catch (PDOException $e) {
    echo $e;
}


$cart=$_SESSION['cart'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="styles.css" />
    <script type="text/javascript" src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
</head>

<body>


    <?php require_once("header1.php"); ?>
    <div class="container" id="page-container">

        <div class="row" style="height:80%;" id="content-wrap">
            <div class="col-md-2 ml-0 pl-0">
                <div>
                    <ul class="nav flex-column" style="font-family:sans-serif;">
                      
                        <?php if (isset($categories)) { ?>
                            <p>Search by Categories</p>
                            <form action="viewProductCategory.php" method="get">
                                <select name="cid" class="form-control form-control-sm">
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category['Catid']; ?>"> <?php echo $category['Catiname'];
                                                                                        } ?></option>
                                </select>
                            <?php } ?>
                            <input type="submit" name="submit" value="search" class="btn btn-primary">
                            </form>
                            <br>
                            <form action="searchPrice.php" method="get">
                                <fieldset>
                                    <legend> by Price</legend>
                                    <input type="radio" name="item" value="first">$100000-$200000<br>
                            <input type="radio" name="item" value="second">$200000-$400000<br>
                            <input type="radio" name="item" value="third">$500000-$600000<br>
                            <input type="radio" name="item" value="fourth">$700000-$800000<br>
                            <input type="radio" name="item" value="fifth"> above $800000<br>
                                    <input type="submit" class="btn btn-primary" value="Search" name="submit">

                                </fieldset>
                            </form>


                    </ul>
                </div>
            </div>



            <div class="col-md-10">
                <div class="row d-flex justify-content-center p-2 m-2 border border-success">

                </div>
                <table class="table">
                    <?php
                    echo " 
                    <tr>
                        <td>pid</td>
                        <td>pname</td>
                        <td>price</td>
                        <td>pimg</td>
                        <td>quantity</td>
                        <td>Total</td>
                    </tr>";
                    foreach ($cart as $key => $val) {
                        $row = productDetail($key);
                        $amt = (float)$row['pprice'] * (float)$val;
                        echo "<tr>
                                <td>$key</td>
                                <td>$row[pname]</td>
                                <td>$row[pprice]</td>
                                <td><img src=../admin/$row[pimg] style=width:100px></td>
                                <td>$val</td>
                                <td>$amt</td>
                                </tr>";
                    }
                    ?>
                </table>
                <?php
                if(isset($_GET['id'])){
                    ?>
                    <div>
                        <form class="form" method="post" action="checkout.php">
                            <fieldset>
                                <legend style="color:darkolivegreen"><b>Payment Option</b></legend>
                                <select class="form-select"name="bank">
                                    <option value="KBZ">KBZ</option>
                                    <option value="AYA">AYA</option>
                                </select><br>
                                Choose Account Number<input type="text" name="acno" class="form-control"><br>
                                <button type="submit" name="submit" style="color:blue">submit</button>
                            </fieldset>
                        </form>
                    </div>
                <?php } else { ?>
                    <p style="color:crimson">Please click for checkout</p>
<p><a href="cartView.php?id=1"><img src="checkout.jpg" width=80px height=60px></a></p>
               <?php } ?>
            </div>
        </div>
        <hr>
        <footer id="footer">
            <p>Copyright all right reserved </p>
            <p>2023</p>
        </footer>
    </div>