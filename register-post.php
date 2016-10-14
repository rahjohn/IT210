<?php
session_start();
include 'settings.php';
$conn = new mysqli($DBserver, $DBuser, $DBpassword, $DBname);
if ($conn->connect_error) {
  die("Connection failed: " .$conn->connect_error);
}
$sql = 'SELECT hashedpassword FROM Users where username = \'' . $_POST["username"] . '\'';
$name = $_POST["name"];
$username = $_POST["username"];
$email = $_POST["email"];
$passwordMatch = sha1($_POST["password"]);
$passwordMatchConf = sha1($_POST["confPassword"]);
$result = mysqli_query($conn, $sql);
$db_handle = mysqli_connect("localhost","guest","guest", $DBname);
if (mysqli_num_rows($result)== 1) {
    while($row = mysqli_fetch_assoc($result)) {
          $currentPage = "User Already Exists";
          include 'header.php';
          echo "<center><h1>That user already exists</h1><br><a href=\"register.php\">Try Again?</a></center>";
          include 'footer.php';
    }
} elseif ($passwordMatch !== $passwordMatchConf) {
    $currentPage = "Passwords Didn't Match";
    include 'header.php';
mysqli_close($conn);
    echo "<center><h1>Your passwords didn't match</h1><br><a href=\"register.php\">Try Again? </a></center>";
    include 'footer.php';
} else {
$name = mysqli_escape_string($conn, $name);
$username = mysqli_escape_string($conn, $username);
$email = mysqli_escape_string($conn, $email);
$passwordMatch = mysqli_escape_string($conn, $passwordMatch);
    $sql = "INSERT INTO `Users` (`name`, `username`, `email`, `hashedpassword`) VALUES ('$name', '$username', '$email', '$passwordMatch')";
    $result = mysqli_query($conn, $sql);
        echo "Account created " . $_POST["username"];
mysqli_close($conn);
              header( 'Location: login.php' );
}
mysqli_close($conn);
?>