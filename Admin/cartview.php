<?php
require_once("dbconnect.php");
     $conn =  connect();
try {
    $sql ="select * from product";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll();

    $sql = "select * from category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll();
   
}catch(PDOException $e)
{
    echo $e;
}





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


    <?php require_once("header.php"); ?>
    <div class="container">

        <div class="row" style="height:80%;">
            <div class="col-md-2 ml-0 pl-0">
                <div>
                    <ul class="nav flex-column" style="font-family:sans-serif;">
                        <li class="nav-item" style="text-align:left;">
                            <a class="nav-link btn-link" href="insertProduct.php">Insert Product</a>
                        </li>
                        <li class="nav-item" style="text-align:left;">
                            <a class="nav-link btn-link" href="updateProduct.php">Update Product</a>
                        </li>
                        <li class="nav-item" style="text-align:left;">
                            <a class="nav-link btn-link" href="deleteProduct.php">Delete Product</a>
                        </li>
                        <li class="nav-item" style="text-align:left;">
                            <a class="nav-link btn-link" href="viewProductUser.php">View Product</a>
                        </li>
                        <?php  if(isset($categories)) { ?>
                        <p>Search by Categories</p>
                        <form action="viewProductCategory.php" method="get">
                        <select name="cid" class="form-control form-control-sm">
                          <?php  foreach($categories as $category){ ?>
                            <option value="<?php echo $category['catid']; ?>"> <?php echo $category['catname']; } ?></option>
                        </select>
                        <?php } ?>
                        <input type="submit" name="submit" value="search" class="btn btn-primary">
                        </form>
                        <br>
                        <br>
                        <br>
                    
                        <form action="searchPrice.php" method="get">
                        <fieldset><legend>By Price</legend> 
                            <input type="radio" name="item" value="first">$30000-$400000<br>
                            <input type="radio" name="item" value="second">$400001-$1000000<br>
                            <input type="radio" name="item" value="third">$1000001-$2000000<br>
                            <input type="radio" name="item" value="fourth">$2000001-$5000000<br>
                            <input type="radio" name="item" value="fifth">Above $5000000<br>
                            <input type="submit" class="btn btn-primary" value="Search" name="submit">


                        </fieldset>

                        </form>
                    </ul>
                </div>
            </div>



            <div class="col-md-10">
            <div class="row d-flex justify-content-center p-2 m-2 border border-success">
                <?php   if(isset($products))
                { foreach($products as $product) {   ?>
                <div class="card p-2 m-2" style="width: 20rem;">
                    <img class="card-img-top" src="<?php echo $product['pimg']?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['pname'] ?></h5>
                        <h3 class="card-title"><?php echo "$".$product['pprice'] ?></h3>
                        <h3 class="card-title"><?php echo $product['pcatid'] ?></h3>
                        <p class="card-text"><?php echo $product['pspec'] ?></p>
                        <a href="#" class="btn btn-primary">Register to Buy</a>
                    </div>
                </div>
                <?php } } ?>
                </div>






            </div>
        </div>
    </div>