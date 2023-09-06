<?php
require_once("dbconnect.php");
$conn=connect();
    if(isset($_POST['submit']))
    {
      $pid = $_POST['pid'];
      $pname = $_POST['pname'];
      $category = intval($_POST['category']);
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];
      $specification = $_POST['description'];
      $pfile = $_FILES['pimg']['name'];
      $filepath = "images/".$pfile;
    }
    try
    {
      move_uploaded_file($_FILES['pimg']['tmp_name'],$filepath);
      echo "file upload success.";
    }
    catch(Exception $ex)
    {
      echo $ex;
    }

    try
    {
        $sql = "Update product set pname=?, pprice=?, pdesc=?, pqty=?, pcatid=?, pimg=? where pid=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$pname,$price,$specification,$quantity,$category,$filepath,$pid]);  
        $_SESSION['updateSuccess'] = "Product has been update successfully.";
        header("Location:viewproduct.php");
    }
    catch(PDOException $pdoex)
    {
      echo $pdoex;
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
</head>

<body style="background-color:chartreuse">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="nav_bar">
                   
                </div>
            </div>
            <div class="col-md-9">
                <div style="display:flex; ">
                <form class="insert" method="post" enctype="multipart/form-data" action="updateproduct.php" >
                    <div class="form-group row">
                        <input type="hidden" name="pid" value="<?php echo $product['pid']?>">
                        <label for="pname" style="color:blue">Product Name</label>

                        <input type="text" value="<?php echo $product['pname']?>"class="form-control" name="pname">
                        </div>
                    <div class="form-group row">
    <label for="category" style="color:blue">Select Category</label>
    <select class="form-control" id="category" name="category">
        <?php if(isset($rows)) foreach($rows as $row){?>
      <option value="<?php echo $row['Catid'] ?>">
      <?php echo $row['Catiname'];?>
      </option>
      <?php } ?>
      
    </select>
  </div>
                    <div class="form-group row">
                        <label for="price" style="color:blue">Price</label>
                        <input type="number" class="form-control" name="price" value="<?php echo $product['pprice'] ?>">
                    </div>
                    <div class="form-group row">
              <label for="quantity" style="color:blue">Quantity</label>
              <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="<?php echo $product['pqty']?>">
            </div>
                    <div class="form-group row">
                        <label for="specification" style="color:blue">Specification</label>
                        <textarea class="form-control" name="specification" id="exampleFormControlTextarea1" rows="4" placeholder="<?php echo $product['pdesc']?>"></textarea>
            </div>
            <div class="custom-file row">
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="pimg">
                <label class="custom-file-label" for="inputGroupFile01" style="color:blue">Choose file</label>
            </div>
        </div><br>
        <button type="submit" class="btn btn-primary" style="color:chartreuse" name="submit">-Submit-</button>
        </form></div>
    </div>
    </div>
    </div>
    </div>
</body>

</html>