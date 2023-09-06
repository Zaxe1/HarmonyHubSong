<?php
require_once("dbconnect.php");
$conn =  connect();
if (isset($_GET['submit'])) {
    try {
        $catid = $_GET['cid'];
        $sql = "select * from product where pcatid=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$catid]);
        $products = $stmt->fetchAll();
        $count=$stmt->rowCount();

        $sql = "select * from category";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll();
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
        <div class="row" style="height:80%;">
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
                            <br>
                            <input type="submit" name="submit" value="Search" style="color: white;" class="btn btn-success">
                            </form>
                            <br>
                            
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row d-flex justify-content-center p-2 m-2 border border-success">
                    <?php if (isset($count) && $count>0) {
                        foreach ($products as $product) {   ?>
                            <div class="card p-2 m-2" style="width: 17rem;">
                                <img class="card-img-top" src="<?php echo $product['pimg'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title" style="color:black"><b><?php echo $product['pname'] ?></b></h5><h3 class="card-title" style="color:black"><b><?php echo "$" . $product['pprice'] ?></b></h3>

<h3 class="card-title" style="color:black"><b><?php echo "Stock: " . $product['pqty'] ?></b></h3>
<p class="card-text" style="color:black"><b><?php echo $product['pdesc'] ?></b></p>
<form  action="addCart.php" method="post"> 
                            <input type="hidden" name="pid" value="<?php echo $product['pid'] ?>">
                             <input type="submit" name="submit" class="btn btn-primary" value="add to cart">
                        </form>
</div>
</div>
<?php }}  else {?>
<p class="alert alert-info" style="height:max-content;">There is no item to this category"</p>
<?php }?>
</div>
</div>
</div>
</div>
<footer id="footer" style="color:chartreuse; text-align:center">


</footer>