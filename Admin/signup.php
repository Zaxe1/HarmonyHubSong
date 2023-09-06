<?php
require_once("header.php");
if(!isset($_SESSION)){
    session_start();
}
require_once("dbconnect.php");
require_once("strongPassword.php");
function insertAdminData($username,$fullname,$password,$gender,$email,$dob,$nrc,$phone,$father,$address){
    $conn= connect();
    $password_hash=password_hash($password,PASSWORD_DEFAULT);
    try{$sql="insert into admin (username,fullname,password,gender,email,dob,nrc,phone,father,address)
     values (?,?,?,?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->execute([$username,$fullname,$password_hash,$gender,$email,$dob,$nrc,$phone,$father,$address]);
    }
    catch(PDOException $e){
        echo $e;
    }//End of the function
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $cpassword= $_POST['cpassword'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $nrc = $_POST['nrc'];
    $phone = $_POST['phone'];
    $father = $_POST['father'];
    $address = $_POST['address'];

    if (strlen($password) >= 8 && \strlen($cpassword) >= 8 && strcmp($password, $cpassword) >= 8)
        $_SESSION['pwdErr'] = 'pasword length must be atleast 8 abd contains Uppercase,Lowercase letter, digits and special characters.';
    else if (strcmp($password, $cpassword) != 0) {
        $_SESSION['pwdErr'] = 'Password and confirm password must be the same';
    } else if (!isStrongPassword($password)) {
        $_SESSION['pwdErr'] = 'password must be strong password';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emlErr'] = 'Invalid email format';
    } else {
        insertAdminData($username,$fullname,$password,$gender,$email,$dob,$nrc,$phone,$father,$address);
        $_SESSION['reg_finished'] = true;
         header("Location:index.php");
    }
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container-fluid" id="cont">
        <div id="signupformParent">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="form-group">
                    <label for="username" style="color:antiquewhite">Username <i class="fas fa-user"></i></label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="fullname" style="color: antiquewhite;">Fullname <i class="fas fa-user-circle"></i></label>
                    <input type="text" class="form-control" name="fullname" id="fullname">
                </div>
                <p style="color:antiquewhite">Choose Gender <i class="fas fa-venus-mars"></i></p>
                <div class="form-check">
                    <label class="form-check-label" style="color: antiquewhite">
                        <input type="radio" class="form-check-input" name="gender" value="M" required>Male
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" style="color: antiquewhite">
                        <input type="radio" class="form-check-input" name="gender" value="F" required>Female
                    </label>
                </div>
                <div class="form-group">
                    <label for="email" style="color: antiquewhite">Email address <i class="fas fa-envelope"></i></label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <?php if (isset($_SESSION['pwdErr'])) {
                        echo "<span class='alert alert-danger'>" . $_SESSION['pwdErr'] . "</span>";
                    }
                    ?>
                    <label for="password" style="color: antiquewhite">Password <i class="fas fa-lock"></i></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="cpassword" style="color: antiquewhite">Confirm Password <i class="fas fa-lock"></i></label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                </div>
                <div class="form-group">
                    <label for="dob" style="color: antiquewhite">Date of Birth <i class="fas fa-calendar"></i></label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="nrc" style="color: antiquewhite">NRC <i class="fas fa-id-card"></i></label>
                    <input type="text" class="form-control" id="nrc" name="nrc" required>
                </div>
                <div class="form-group">
                    <label for="phone" style="color: antiquewhite">Phone <i class="fas fa-phone"></i></label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="father" style="color: antiquewhite">Father's Name <i class="fas fa-male"></i></label>
                    <input type="text" class="form-control" id="father" name="father" required>
                </div>
                <div class="form-group">
                    <label for="address" style="color: antiquewhite">Address <i class="fas fa-address-card"></i></label>
                    <textarea class="form-control" id="address" name="address" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">
                    <i class="fas fa-check"></i> Submit
                </button>
            </form>
        </div>
    </div>
</body>
</html>
