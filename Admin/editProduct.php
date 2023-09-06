<?php
  require_once("header.php");
  require_once("dbconnect.php");
  if (!isset($_SESSION)) 
  {
    session_start();
  }
  $conn = connect();
  $sql = "Select * from category";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll();//Returns multiple rows rows=categories

  if(isset($_GET['pid']))
  {
    $pid = $_GET['pid'];//User data from form
    try
    {
      $sql = "Select * from product where pid=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$pid]);
      $product = $stmt->fetch();//Return single row based on pid
    }
    catch(PDOException $pdoex)
    {
      echo $pdoex;
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
  </head>
  <body>
    <div calss = "container">
      <div class = "row">
        <div class = "col-md-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <b><a class="nav-link active" href="insertProduct.php?task=ins" style="color:white">Insert</a></b>
            </li>
            <li class="nav-item">
              <b><a class="nav-link" href="updataProduct.php" style="color:white">Update</a></b>
            </li>
            <li class="nav-item">
              <b><a class="nav-link" href="deleteProduct.php" style="color:white">Delete</a></b>
            </li>
            <li class="nav-item">
              <b><a class="nav-link disabled" href="viewProduct.php" style="color:white">View</a></b>
            </li>
          </ul>
      </div>
      <div class = "col-md-9">
        <div style="display:flex; align-items:center">
          <form style="width:max-content" paction = "<?php echo $_SERVER['PHP_SELF']?>" action="updateProduct.php" method = "post" enctype = "multipart/form-data">
            <div class="form-group row">
              <input type="hidden" name="pid" value="<?php echo $product['pid']?>">
              <label for="pname" class="justify-content-end" style="color:white">Product Name</label>
              <input type="text" value="<?php echo $product['pname']?>" class="form-control" name="pname" placeholder="Enter Product Name">
            </div>
            <div class="form-group row">
              <label for="category" style="color:white">Select Category</label>
                <select class="form-control" id="category" name="category">
                  <?php 
                    if(isset($rows)) foreach($rows as $row)
                    {
                  ?>
                    <option value="<?php echo $row['Catid']?>">
                  <?php 
                    echo $row['Catiname'];
                  ?>
                    </option>
                  <?php 
                    }
                  ?>
                </select>
            </div>
            <div class="form-group row">
              <label for="price" style="color:white">Price</label>
              <input type="number" class="form-control" name="price" value="<?php echo $product['pprice']?>" placeholder="Price">
            </div>
            <div class="form-group row">
              <label for="quantity" style="color:white">Quantity</label>
              <input type="number" class="form-control" name="quantity" value="<?php echo $product['pqty']?>" placeholder="Quantity">
            </div>
            <div class="form-group row">
              <label for="description" style="color:white">Description</label>         
              <textarea class="form-control" name="description" placeholder="<?php echo $product['pdesc']?>" rows="2"></textarea>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" name = "pimg">
              <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
            </div>
            <button style = "text-align:center" type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>      
        </div>
      </div>
    </div>
  </body>
</html>