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


    <?php require_once("header1.php"); ?>
    <div class="container" id="page-container">

        <div class="row" style="height:80%;" id="content-wrap">
            <div class="col-md-2 ml-0 pl-0">
                <div>
                    <ul class="nav flex-column" style="font-family:sans-serif;">
                 
                        <?php  if(isset($categories)) { ?>
                        <p>Search by Categories</p>
                        <form action="viewProductCategory.php" method="get">
                        <select name="cid" class="form-control form-control-sm">
                          <?php  foreach($categories as $category){ ?>
                            <option value="<?php echo $category['Catid']; ?>"> <?php echo $category['Catiname']; } ?></option>
                        </select>
                        <?php } ?>
                        <br>
                        <input type="submit" name="submit" value="search" class="btn btn-primary">
                        </form>
                        <br>
                        <form action="searchPrice.php" method="get">
                            <fieldset> <legend style="color:cornflowerblue"><b> By Price</b></legend>
                            <input type="radio" name="item" value="first"><text style="color: blue;">100000-$200000<br>
                            <input type="radio" name="item" value="second"><text style="color: blue;">200000-300000<br>
                            <input type="radio" name="item" value="third"><text style="color: blue;">300000-400000<br>
                            <input type="radio" name="item" value="fourth"><text style="color: blue;">400000-500000<br>
                            <input type="radio" name="item" value="fifth"><text style="color: blue;"> above 500000<br>
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
                <div class="card p-2 m-2" style="width: 17rem;">
                    <img src="<?php echo $product['pimg']?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['pname'] ?></h5>
                        <h3 class="card-title"><?php echo $product['pprice'] ?></h3>
                        <h3 class="card-title"><?php echo $product['pcatid'] ?></h3>
                        <p class="card-text"><?php echo $product['pdesc'] ?></p>

                    </div>
                    <form  action="addCart.php" method="post"> 
                            <input type="hidden" name="pid" value="<?php echo $product['pid'] ?>">
                             <input type="submit" name="submit" class="btn btn-primary" value="add to cart">
                        </form>
                </div>
                <?php } } ?>
                </div>






            </div>
        </div>
        <hr>
        <footer id="footer"><p>Copyright all right reserved </p>
        <p>2023</p></footer>
    </div>
</body>
</html>