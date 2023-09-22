<?php
require_once("dbconnect.php");
$conn = connect();

if (isset($_POST['submit'])) {
    $pid = $_POST['id'];
    $fname = $_POST['fname'];
    $uname = $_POST['username'];
    $pfile = $_FILES['pp']['name'];
    $filepath = "images/" . $pfile;

    try {
        move_uploaded_file($_FILES['pp']['tmp_name'], $filepath);
        echo "File upload success.";
    } catch (Exception $ex) {
        echo $ex;
    }

    try {
        $sql = "UPDATE users SET fname=?, username=?, pp=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fname, $uname, $filepath, $pid]);
        $_SESSION['updateSuccess'] = "User has been updated successfully.";
        header("Location: home.php");
    } catch (PDOException $pdoex) {
        echo $pdoex;
    }
}
?>

