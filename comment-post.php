<?php
session_start();
include 'settings.php';
$conn = new mysqli($DBserver, $DBuser, $DBpassword, $DBname);
if ($conn->connect_error) {
  die("Connection failed: " .$conn->connect_error);
}
$sql = "SELECT ID FROM Users WHERE name='" . $_SESSION['name'] . "'";
$comment = $_POST["comment"];
$result = mysqli_query($conn, $sql);
$db_handle = mysqli_connect("localhost","guest","guest", $DBname);
$comment = mysqli_escape_string($conn, $comment);
    $sql = "INSERT INTO 'Comments' (';
    $result = mysqli_query($conn, $sql);
        echo "Account created " . $_POST["username"];
mysqli_close($conn);
              header( 'Location: login.php' );
}
mysqli_close($conn);
?>
