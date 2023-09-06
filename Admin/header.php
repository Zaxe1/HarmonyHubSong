<?php
if(!isset($_SESSION)){
session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="main.js"></script>
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><b>Gaming World</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="arthadmin.php"><i class="fas fa-home"></i> <b>Home</b> <span class="sr-only">(current)</span></a>
        </li>
        <?php if (isset($_SESSION['isLoggedIn']) && isset($_SESSION['userID'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php"><i class="fas fa-chart-bar"></i> <b>Dashboard</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewProduct.php"><i class="fas fa-list-alt"></i> <b>View Order Details</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="insertProduct.php"><i class="fas fa-chart-bar"></i> <b>Insert Product</b></a>
          </li>
        <?php } ?>
      </ul>

      <?php if (isset($_SESSION['isLoggedIn']) && isset($_SESSION['userID'])) { ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <span class="navbar-text" style="margin-right: 20px;">
              <i class="fas fa-user"></i> Logged in as <?php echo $_SESSION['userID']; ?>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </li>
        </ul>
      <?php } elseif (isset($_SESSION['reg_finished'])) { ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><i class="fas fa-sign-in-alt"></i> Login</a>
          </li>
        </ul>
      <?php } else { ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><i class="fas fa-sign-in-alt"></i> Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php"><i class="fas fa-user-plus"></i> Sign Up</a>
          </li>
        </ul>
      <?php } ?>
<?php
if(isset($_SESSION['cart'])){
  ?>
  <li class="nav-item">
    <a href=""><img src="" style="width:70px;height:auto"></a>
  </li>
<?php }
?>
    </div>
  </nav>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
