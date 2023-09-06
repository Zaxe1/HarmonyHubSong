<?php
require_once("dbconnect.php");
$conn = connect();

if (isset($_GET['submit'])) {

    try {
        $item = $_GET['item']; //first,second,third,fourth,fifth
        $sql = "select * from product where pprice between ? and ? ";
        $stmt = $conn->prepare($sql);
        if ($item == "first") {
            $stmt->execute([100000, 200000]);
        } elseif ($item == "second") {
            $stmt->execute([200000, 300000]);
        } elseif ($item == "third") {
            $stmt->execute([300000, 400000]);
        } elseif ($item == "fourth") {
            $stmt->execute([400000, 500000]);
        } elseif ($item == "fifth") {
            $stmt->execute([500000, 600000]);
        }

        $products = $stmt->fetchAll();

        $sql = "select * from category";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll();
        $count = $stmt->rowCount();
    } catch (PDOException $e) {
        echo $e;
    }
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
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="nav_bar">
                    <ul class="nav flex-column">
                       
                        <form action="searchPrice.php" method="get">
                        <legend style="color:cornflowerblue"><b> By Price</b></legend>
                            <input type="radio" name="item" value="first"><text style="color: blue;">100000-200000</text><br>
                            <input type="radio" name="item" value="second"><text style="color: blue;">200000-300000</text><br>
                            <input type="radio" name="item" value="third"><text style="color: blue;">300000-400000</text><br>
                            <input type="radio" name="item" value="fourth"><text style="color: blue;">400000-500000</text><br>
                            <input type="radio" name="item" value="fifth"><text style="color: blue;">above 500000</text><br>
                            <br>
                            <input type="submit" class="btn btn-success" style="color: white;" value="Search" name="submit"><br>
                        </form>
                        <?php if (isset($categories)) { ?>
                            <p>Select to find</p>
                            <form action="viewProductCategory.php" method="get">
                                <select name="Catid">
                                    <?php foreach ($categories as $category) { ?>
                                        <option value=" <?php $category['Catid']; ?>"> <?php echo $category['Catiname'];
                                                                                    } ?> </option>
                                </select>
                            <?php } ?>
                            <br>
                            <br>
                            <input type="submit" name="submit" value="Search" class="btn btn-primary">
                            </form>
                    </ul>
                </div>
            </div>

            <div class="col-md-10">
                <div class="row d-flex justify-content-center p-2 m-2 border border-success">
                    <?php if (isset($count) && $count > 0) {
                        foreach ($products as $product) { ?>
                            <div class="card-p-2 m-2" style="width: 17rem;">
                                <img class="card-img-top" src="<?php echo $product['pimg'] ?>" alt="Card image cap">
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
                        <?php }
                    } else { ?>
                        <p class="alert alert-info" style="height:max-content;">There is no price to this category"</p>
                    <?php } ?>
                </div>


            </div>
        </div>
    </div>
</body>
</html>