<?php
require_once("header.php");
require_once("dbconnect.php");
if (!isset($_SESSION)) {
  session_start();
}
$conn=connect();
if(isset($_SESSION['loginSuccess'])){
  $sql= "select * from product";
  $stmt= $conn->prepare($sql);
  $stmt->execute();
  $stmt-> fetchAll();
  $productCount=$stmt->rowCount();

  $sql= "select * from category";
  $stmt= $conn->prepare($sql);
  $stmt->execute();
  $stmt-> fetchAll();
  $catCount=$stmt->rowCount();

  $sql= "select * from admin";
  $stmt= $conn->prepare($sql);
  $stmt->execute();
  $stmt-> fetchAll();
  $adminCount=$stmt->rowCount();
  
  
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
  <?php if (isset($_SESSION['isLoggedin']) && isset($_SESSION['userID']))   ?>
  <p class="alert alert-success">

    <?php {
      if (isset($_SESSION['loginSuccess'])) {
        echo $_SESSION['loginSuccess'];
        unset($_SESSION['loginSuccess']);
      }
    } ?> </p>
  <?php ?>
  <div class="container">
    <div class="column">
      <div class="col-md-3">
        <div class="nav_bar">
          <ul class="nav flex-column">
            
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="row mb-3">
            <div class="col-xl-3 col-sm-6 py-2">
              <div class="card bg-success text-white h-100">
                <div class="card-body bg-success">
                  <div class="rotate">
                    <i class="fa fa-user fa-4x"></i>
                  </div>
                  <h6 class="text-uppercase">Admin Total</h6>
                  <h1 class="display-4"><?php if (isset($adminCount)) {
                                          echo $adminCount;
                                        } ?>
                  </h1>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-2">
              <div class="card text-white bg-danger h-100">
                <div class="card-body bg-danger">
                  <div class="rotate">
                    <i class="fa fa-list fa-4x"></i>
                  </div>
                  <h6 class="text-uppercase">Product Total</h6>
                  <h1 class="display-4"><?php if (isset($productCount)) {
                                          echo $productCount;
                                        } ?>
                  </h1>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-2">
              <div class="card text-white bg-info h-100">
                <div class="card-body bg-info">
                  <div class="rotate">
                    <i class="fa fa-twitter fa-4x"></i>
                  </div>
                  <h6 class="text-uppercase">Category Total</h6>
                  <h1 class="display-4"><?php if (isset($catCount)) {
                                          echo $catCount;
                                        } ?>
                  </h1>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-2">
              <div class="card text-white bg-warning h-100">
                <div class="card-body">
                  <div class="rotate">
                    <i class="fa fa-share fa-4x"></i>
                  </div>
                  <h6 class="text-uppercase">Shares</h6>
                  <h1 class="display-4">36</h1>
                </div>
              </div>
            </div>
          </div>

          <?php if (isset($catCount)) {
            echo $catCount;
          } ?>

        </div>

      </div>



    </div>
  </div>


</body>

</html>