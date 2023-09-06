<?php
require_once("header1.php");
if (!isset($_SESSION)) {
    session_start();
}
require_once("dbconnect.php");
require_once("strongPwd.php");

function insertUserData($uname,$fullname,$pwd,$gender,$email,$dob,$nrc,$phone,$address)
{
    $conn = connect();
    $pwd_hash= password_hash($pwd, PASSWORD_DEFAULT);
    echo $pwd_hash."in insert user data ";
    try {
        $sql="insert into users 
        (username,fullname,password,gender,email,dob,nrc,phone,address) 
         values
        (?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname,$fullname,$pwd_hash,$gender,$email,$dob,$nrc,$phone,$address]);
    }catch(PDOException $e){ echo $e;}

}// end of the function

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $nrc = $_POST['nrc'];
    $phone = $_POST['phone'];
    $father =$_POST['father'];
    $address = $_POST['address'];

    if (strlen($password) < 8 || strlen($cpassword) < 8) {
       $_SESSION['pwdErr'] = 'password length must be at least 8 and
        contains Uppercase, Lowercase letter , digit and special character';
    } elseif (strcmp($password, $cpassword) != 0) {
       $_SESSION['pwdErr'] = ' Password and confirm password must be the same';
    } elseif (!isStrongPassword($password)) {   // echo "in strong password or not";
        $_SESSION['pwdErr'] = 'password must be strong password';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emlErr'] = 'invalid email format';
    } else {
        //insertAdminData($uname,$fullname,$pwd,$gender,$email,$dob,$nrc,$phone,$father,$address)
try {
    insertUserData($username, $fullname, $password, $gender, $email, $dob, $nrc, $phone, $address);
}catch(PDOException $e)
{
     echo $e;
}
        $_SESSION['reg_finished']="You have successfully sign up!!!";
        header("Location:index.php");
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
    <script type="text/javascript" src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container-fluid" id="cont">
        <div id="signupFormParent">

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <fieldset>
                    <legend style="color:chartreuse"> Sign Up </legend>
                    <div class="form-group">
                        <label for="username" style="color:chartreuse">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>

                    </div>
                    <div class="form-group">
                        <label for="fullname" style="color:chartreuse">Fullname</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" required>

                    </div>

                    <div class="form-group">
                        <?php if (isset($_SESSION['pwdErr'])) {
                            echo "<span class='alert alert-danger'>" . $_SESSION['pwdErr'] . "</span>";
                            unset($_SESSION['pwdErr']);
                        }
                        ?>
                        <label for="password" style="color:chartreuse">Password</label>

                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="cpassword" style="color:chartreuse">Confirm Password</label>

                        <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                    </div>
                    <p style="color:chartreuse">Choose Gender</p>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="m" required style="color:blanchedalmond">Male
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="f" required style="color:aqua">Female
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="email" style="color:chartreuse">Email address</label>
                        <input type="email" class="form-control" id="email" name=email required>
                    </div>
                    <div class="form-group">
                        <label for="dob" style="color:chartreuse">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name=dob required>
                    </div>
                    <div class="form-group">
                        <label for="nrc" style="color:chartreuse">NRC</label>
                        <input type="text" class="form-control" id="nrc" name=nrc required>
                    </div>
                    <div class="form-group">
                        <label for="phone" style="color:chartreuse">Phone</label>
                        <input type="tel" class="form-control" id="phone" name=phone required>
                    </div>
                    <div class="form-group">
                        <label for="father" style="color:chartreuse">Father Name</label>
                        <input type="text" class="form-control" id="father" name=father required>
                    </div>
                    <div class="form-group">
                        <label for="address" style="color:chartreuse">Address</label>
                        <textarea class="form-control" id="address" name=address required>  </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </fieldset>


        </div>


    </div>

    </form>
    </div>
    </div>
</body>
</html>