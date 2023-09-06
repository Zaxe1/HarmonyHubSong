<?php
require_once("dbconnect.php");
if (!isset($_SESSION)) {
    session_start();
}
$conn = connect();
$sql = "select * from category";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();

if (isset($_POST['submit'])) {
    //pname, category, price, qty,description,pimg
    $pname = $_POST['pname'];   // user data from form
    $category = intval($_POST['category']);
    echo gettype($category);
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $description = $_POST['description'];
    $pfile = $_FILES['pimg']['name'];
    $filepath = "images/" . $pfile;
try {
    move_uploaded_file($_FILES['pimg']['tmp_name'], $filepath);// fisrt arg source file and second arg dest.
   
}catch(Exception $e)
{
    echo $e;
}





    //pid  pname  pprice  pdesc  pqty  pcatid  pimg
    try {
        $sql = "insert into product 
        (pname,pprice,pdesc,pqty,pcatid,pimg)
        values 
        (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$pname, $price, $description, $qty, $category, $filepath]);
        $_SESSION['insertSuccess'] = "product has been successfully inserted.";
        header("Location:viewProduct.php");
    } catch (PDOException $pe) {
        echo $pe;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body{
            background-image: url('spdi.jpg');
        }
    </style>
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
            <div class="col-md-3">
                <div style="padding-top:20px">
                  
                </div>
                <br>
                <p style="color:deeppink">we believe in pushing the boundaries of innovation, and our latest creation, [Product Name], is a testament to that commitment. As a leader in the [Product Category] industry, we're excited to introduce you to a new era of [Product Experience] that will transform the way you [Interact with the Product or Benefit].

Our journey began with a simple yet powerful idea: to design a [Product Category] that not only meets your needs but exceeds your expectations. After countless hours of research, development, and collaboration, we're proud to unveil [Product Name], a culmination of cutting-edge technology, elegant design, and user-centric features.</p>
            </div><div class="col-md-9">
               
               <div style="display:flex;">
                   <form class="form" style="width:60%;margin:20px;font-family:Arial, Helvetica, sans-serif" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                       <fieldset class="border p-2">
                           <legend  style="color:blue">Insert Product</legend>
                           <div class="form-group">
                               <label for="pname" class="justify-content-end" style="color:blue">Product Name</label>
                               <input type="text" class="form-control" name="pname">
                           </div>
                           <div class="form-group">
                               <label for="category" style="color:blue"> Select Category</label>
                               <select class="form-control" id="category" name="category">
                                   <?php if (isset($rows))
                                       foreach ($rows as $row) {  ?>
                                       <option value="<?php echo $row['Catid'] ?>">
                                           <?php echo $row['Catiname'];   ?>
                                       </option>
                                   <?php } ?>
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="price" class="justify-content-end" style="color:blue">Price</label>
                               <input type="number" class="form-control" name="price">
                           </div>
                           <div class="form-group">
                               <label for="qty" class="justify-content-end" style="color:blue">Quantity</label>
                               <input type="number" class="form-control" name="qty">
                           </div>
                           <div class="form-group">
                               <label for="description" class="justify-content-end" style="color:blue">Description</label>
                               <textarea class="form-control" name="description" rows="1"></textarea>
                           </div>
                           <div class="custom-file w-125">
                               <input type="file" class="custom-file-input" id="inputGroupFile01" name="pimg" aria-describedby="inputGroupFileAddon01">
                               <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                           </div>
                           <br>
                           <div> <button style="text-align:center" type="submit" class="btn btn-primary" name="submit">Submit</button></div>
                       </fieldset>
                   </form>
               </div><!-- div of form end -->

           </div><!-- div of col column md end 

           <div class="row" id="footer">
           <div class="col-md-12 copy" style="background-color:chocolate;">
               <div class="text-center"> © Copyright 2023 - Company Name. All rights reserved. </div>
           </div>
       </div>-->
   

       </div><!--container end-->

     







</body>

</html>