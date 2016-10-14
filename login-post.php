<html>
<body>
<?php
session_start();
include 'settings.php';
$conn = new mysqli($DBserver, $DBuser, $DBpassword, $DBname);
if ($conn->connect_error) {
  die("Connection failed: " .$conn->connect_error);
}
$sql = 'SELECT hashedpassword FROM Users where username = \'' . $_POST["username"] . '\'';
$result = mysqli_query($conn, $sql);
$db_handle = mysqli_connect("localhost","guest","guest", $DBname);
if (mysqli_num_rows($result)== 1) {
    while($row = mysqli_fetch_assoc($result)) {
          if ($row["hashedpassword"] == sha1($_POST["password"])) {
          echo "You have successfully authenticated as " . $_POST["username"];
          $_SESSION['login_user']=$_POST["username"];
          $_SESSION['name'] = $row['name'];
          echo $DBtable;
          $checkPassword = sha1($_POST["password"]);
          $checkUsername = $_SESSION['login_user'];
          mysqli_query($db_handle, "UPDATE $DBtable SET loggedin = '1' WHERE username = '$checkUsername' and hashedpassword = '$checkPassword';");
          header( 'Location: home.php' );
          } else {
          $currentPage = "Not Authorized";
          include 'header.php';
          echo "<center><img src='wrong.jpg' alt='404cat' align='middle'><br><a href=\"login.php\">Try Again?</a></center>";
          include 'footer.php';
          }
    }
} else {
          $currentPage = "Not Authorized";
          include 'header.php';
          echo "<center><h1>Wrong Username</h1><img src='wrongu.jpg' alt='404cat' align='middle'><br><a href=\"login.php\">Try Again?</a></center>";
          include 'footer.php';
}
mysqli_close($conn);
?>
</body>
</html>