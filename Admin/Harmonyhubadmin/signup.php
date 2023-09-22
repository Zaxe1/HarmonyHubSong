<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once("dbconnect.php");
require_once("strongPassword.php");

function insertAdminData($fullname, $email, $password, $address, $date)
{
    $conn = connect();
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    try {
        $sql = "INSERT INTO admin (fullname, email, password, address, date) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fullname, $email, $password_hash, $address, $date]);
        echo "Registration success";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirm_password']; // Correct the variable name
    $address = $_POST['address'];
    $date = $_POST['date'];

    if (strlen($password) < 8 || strlen($cpassword) < 8) { // Correct the password length check
        $_SESSION['pwdErr'] = 'Password length must be at least 8 characters.';
    } else if (strcmp($password, $cpassword) != 0) {
        $_SESSION['pwdErr'] = 'Password and confirm password must match.';
    } else if (!isStrongPassword($password)) {
        $_SESSION['pwdErr'] = 'Password must be strong (include uppercase, lowercase, digits, and special characters).';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emlErr'] = 'Invalid email format';
    } else {
        insertAdminData($fullname, $email, $password, $address, $date);
        $_SESSION['reg_finished'] = true;
        header("Location: login.php");
        exit; // Make sure to exit after the header redirection
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
  <style>
    body { 
        background-image: url("dj1.jfif");
        background-attachment: fixed;
  background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f2f5; /* Add a background color to the body */
        }

    form {
        
  background-color: #444444;
  border-radius: 10px;
  padding: 20px;
  width: 300px;
  margin: 50px auto;
}

.lb {
  display: block;
  margin-bottom: 10px;
  font-size: 18px;
  font-weight: bold;
}

.infos[type="text"], input[type="email"], input[type="date"],input[type="password"],input[type="confirm_password"],input[type="address"] {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: none;
  margin-bottom: 20px;
  background-color: #333333;
  color: white;
}

#send {
  --glow-color: rgb(176, 255, 189);
  --glow-spread-color: rgba(123, 255, 160, 0.781);
  --enhanced-glow-color: rgb(182, 175, 71);
  --btn-color: rgba(13, 241, 21, 0.508);
  border: .25em solid var(--glow-color);
  padding: 1em 2em;
  color: var(--glow-color);
  font-size: 14px;
  font-weight: bold;
  background-color: var(--btn-color);
  border-radius: 1em;
  outline: none;
  box-shadow: 0 0 1em .25em var(--glow-color),
        0 0 4em 1em var(--glow-spread-color),
        inset 0 0 .05em .25em var(--glow-color);
  text-shadow: 0 0 .5em var(--glow-color);
  position: relative;
  transition: all 0.3s;
}

#send::after {
  pointer-events: none;
  content: "";
  position: absolute;
  top: 120%;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: var(--glow-spread-color);
  filter: blur(2em);
  opacity: .7;
  transform: perspective(1.5em) rotateX(35deg) scale(1, .6);
}

#send:hover {
  color: var(--btn-color);
  background-color: var(--glow-color);
  box-shadow: 0 0 1em .25em var(--glow-color),
        0 0 4em 2em var(--glow-spread-color),
        inset 0 0 .75em .25em var(--glow-color);
}

#send:active {
  box-shadow: 0 0 0.6em .25em var(--glow-color),
        0 0 2.5em 2em var(--glow-spread-color),
        inset 0 0 .5em .25em var(--glow-color);
}

#limpar {
  --glow-color: rgb(255, 176, 176);
  --glow-spread-color: rgba(255, 123, 123, 0.781);
  --enhanced-glow-color: rgb(182, 175, 71);
  --btn-color: rgba(241, 13, 13, 0.508);
  border: .25em solid var(--glow-color);
  padding: 1em 2em;
  color: var(--glow-color);
  font-size: 14px;
  font-weight: bold;
  background-color: var(--btn-color);
  border-radius: 1em;
  outline: none;
  box-shadow: 0 0 1em .25em var(--glow-color),
        0 0 4em 1em var(--glow-spread-color),
        inset 0 0 .05em .25em var(--glow-color);
  text-shadow: 0 0 .5em var(--glow-color);
  position: relative;
  transition: all 0.3s;
}

#limpar::after {
  pointer-events: none;
  content: "";
  position: absolute;
  top: 120%;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: var(--glow-spread-color);
  filter: blur(2em);
  opacity: .7;
  transform: perspective(1.5em) rotateX(35deg) scale(1, .6);
}

#limpar:hover {
  color: var(--btn-color);
  background-color: var(--glow-color);
  box-shadow: 0 0 1em .25em var(--glow-color),
        0 0 4em 2em var(--glow-spread-color),
        inset 0 0 .75em .25em var(--glow-color);
}

#limpar:active {
  box-shadow: 0 0 0.6em .25em var(--glow-color),
        0 0 2.5em 2em var(--glow-spread-color),
        inset 0 0 .5em .25em var(--glow-color);
}
  </style>
  <body>
  <form action="<?php echo $_SERVER ['PHP_SELF']; ?>" method="post">
 
  <h2 class="title" style="color:burlywood"><b>Sign for account</b></h2>
  <label class="lb" for="fullname">Full Name:</label>
    <input name="fullname" id="fullname" type="text" class="infos" required>

    <label for="email" class="lb">E-mail:</label>
    <input name="email" id="email" type="email" class="infos" required>

    <label for="password" class="lb">Password:</label>
    <input name="password" id="password" type="password" class="infos" required>

    <label for="confirm password" class="lb">Confirm Password:</label>
    <input name="confirm_password" id="confirm password" type="password" class="infos" required>

    <label for="address" class="lb">Address:</label>
    <input name="address" id="address" type="text" class="infos" required>

      <label for="data" class="lb">Date:</label>
      <input name="date" id="date" type="date" class="infos">

      <button id="send" type="submit" name=submit>submit</button>
      <button id="limpar" type="reset">Clear </button>
    </form>
  </body>
</html>
