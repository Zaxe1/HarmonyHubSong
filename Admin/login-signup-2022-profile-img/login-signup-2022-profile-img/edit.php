<?php
require_once("dbconnect.php");
if (!isset($_SESSION)) {
    session_start();
}
$conn = connect();

// Assuming you want to work with the 'users' table
$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(); // Returns multiple rows, $users = list of users

// You can now work with the $users array to display or manipulate user data.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit User</title>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Sidebar content, if needed -->
            </div>
            <div class="col-md-9">
                <div style="display:flex; align-items:center">
                    <form style="width:max-content" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="fname" class="justify-content-end" style="color:white">Full Name</label>
                            <input type="text" value="<?php echo $users[0]['fname'] ?>" class="form-control" name="fname" placeholder="Enter Name">
                        </div>

                        <div class="form-group row">
                            <label for="username" style="color:white">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $users[0]['username'] ?>" placeholder="Username">
                        </div>

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="pp">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        </div>
                        <button style="text-align:center" type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
