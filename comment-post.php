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
while($row = mysqli_fetch_array($result)){
    $ID = $row['ID'];
}
$ID = mysqli_escape_string($conn, $ID);
$sql = "INSERT INTO `Comments` (`ID`, `Comment`, `Date`, `UserID`) VALUES (NULL, '$comment', CURRENT_TIMESTAMP, '$ID')";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header( 'Location: projects.php' );
?>
