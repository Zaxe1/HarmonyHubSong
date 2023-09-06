<?php
    require_once("header.php");
    require_once("dbconnect.php");
    if (!isset($_SESSION)) 
    {
        session_start();
    }
    $conn = connect();
    try
    {
        $sql = "select * from product";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll();
    }
    catch (PDOException $e) 
    {
        echo $e;
    }
    function getCategoryName($catid)
    {
        global $conn;
        try
        {
            $sql = "select * from category where Catid=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$catid]);
            $cat=$stmt->fetch();
            return $cat['Catiname'];
        }
        catch(PDOException $e)
        {
            echo $e;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
</head>
<body>
    <?php require_once("header.php"); ?>
    <div class="container mt-5">
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-3 mb-4 d-flex">
                    <div class="card w-100">
                        <img src="<?php echo $product['pimg']?>" class="card-img-top" alt="Product Image">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $product['pname']?></h5>
                            <p class="card-text"><?php echo $product['pdesc']?></p>
                            <p class="card-text">Price: <?php echo $product['pprice']?></p>
                            <p class="card-text mt-auto">Category: <?php echo getCategoryName($product['pcatid'])?></p>
                        </div>
                        <div class="card-footer">
                            <a href="editProduct.php?pid=<?php echo $product['pid']?>" class="btn btn-info">Update</a>
                            <a href="deleteProduct.php?pid=<?php echo $product['pid']?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
