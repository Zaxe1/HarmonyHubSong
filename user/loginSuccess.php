<?php

require_once("header.php");
require_once("dbconnect.php");
$conn = connect();
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_SESSION['loginSuccess'])) {
    $sql = "select * from product";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->fetchAll();
    $productCount = $stmt->rowCount();

    $sql = "select * from category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->fetchAll();
    $catCount = $stmt->rowCount();

    $sql = "select * from admin";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->fetchAll();
    $adminCount = $stmt->rowCount();
}// close isset loginsuccess




//https://bootdey.com/snippets/view/Gradients-dashboard-cards


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
  <?php if (isset($_SESSION['isLoggedIn']) && isset($_SESSION['userId'])) ?>
  <p style="display:block" class="alert alert-success">
    <?php {
      if (isset($_SESSION['loginSuccess'])) {
        echo $_SESSION['loginSuccess'];
        unset($_SESSION['loginSuccess']);
      }
    } ?> </p>
  <?php  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="insertProduct.php">Insert Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">dashboard</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="viewProduct.php">View Product</a>
          </li>
        </ul>



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
</body>

</html>