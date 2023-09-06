<?php
require_once("header.php");
require_once("dbconnect.php");
if (!isset($_SESSION)) {
  session_start();
}
$conn = connect();
if (isset($_SESSION['loginSuccess']) || isset($_SESSION['isLoggedIn'])) {
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
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="script.js"></script>
  <link rel="stylesheet" href="styles.css" />
  <style>
    .center-align {
      
      text-align: right;
    }
    body{
      background-image: url("aplg.jpg");
    }
  </style>
</head>

<body>
  <?php require_once("header.php"); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="nav_bar">
         
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
            <p style="color:green">Greetings and welcome to our cutting-edge interactive dashboard! In today's fast-paced world, data is at the heart of decision-making, enabling us to understand trends, track progress, and make informed choices. This interactive platform has been meticulously designed to empower you with real-time insights, providing a dynamic window into the intricacies of the data that shape our endeavors.
            Our dashboard offers more than just a static representation of numbers; it presents an evolving narrative of your data. By harnessing the power of live updates and interactive visualizations, we give you the tools to explore, analyze, and interpret the latest trends as they unfold. Dive deep into the data, zoom in on specific time frames, and filter through different variables to uncover hidden patterns and correlations.

            </p>
            <h3 style="color:darkturquoise">Select Category</h3>
            <div class="btn-group">
 
  <button class="btn btn-primary" onclick="navigateToCategory('latest')"><a href="lastest.php" style="color:black">Latest Games</button></a>
</div>

          </div>
          
          <div class="center-align">
            <?php if (isset($catCount)) {
              echo $catCount;
            } ?>
          </div>
          
        </div>
        
      </div>
      </div>
  
    </div>
    <footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4>Contact Us</h4>
        <p style="color:black">If you have any questions, feedback, or suggestions, feel free to get in touch with us.</p>
        <ul class="contact-info">
          <li><i class="fa fa-envelope"></i> Email: info@example.com</li>
          <li><i class="fa fa-phone"></i> Phone: +123-456-7890</li>
        </ul>
      </div>
      <div class="col-md-6">
        <h4 style="color:blue">Follow Us</h4>
        <p>Stay connected with us on social media to get the latest updates and news.</p>
        <ul class="social-icons">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</body>

</html>
