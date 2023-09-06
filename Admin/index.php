<?php
require_once("header.php");
require_once("dbconnect.php");
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_POST['submit'])) {
  // extract username and password
  $email = $_POST['email'];
  $password = $_POST['password'];
  $conn = connect();
  $sql = "select * from admin where email=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$email]);
  $userRow = $stmt->fetch();
  if (password_verify($password, $userRow['password'])) {
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['userID'] = $email;
    $_SESSION['loginSuccess'] = "You have logged in successfully";
    header("Location:arthadmin.php");
  } else {
    echo "Invalid Password";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="main.js"></script>
  <title>Login</title>
</head>

<body>
  <div class="container-fluid">
    <div id="formParent">
      <form id="Login form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
          <legend>Login form</legend>

          <div class="form-group">
            <label for="exampleInputEmail1" style="color:blue"><i class="fas fa-envelope"></i> Email address</label>
            <p><input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"></p>
            <small id="emailHelp" class="form-text text-muted" style="color:chartreuse">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="color:blue"><i class="fas fa-lock"></i> Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Submit</button>
          <br>
          <p>If you are a member, please <a href="signup.php"><i class="fas fa-user-plus"></i> SignUp</a> here.</p>
        </fieldset>
      </form>
    </div>
  </div>
  <?php require_once("footer.php") ?>
</body>

</html>
