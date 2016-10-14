<?php
$currentPage = "";
include 'header.php';
?>
	<header>
                <h1 id="welcome">Login</h1>
<?php
?>
            </header>
		<form action="login-post.php" method="post">
  		  Username:
		  <input id="username" type="text" name="username">
		  Password:
		  <input id="password" type="password" name="password">
<!-- Trigger the modal with a button -->
<button type="submit" class="btn btn-info btn-md">Submit</button>

		</form>
<?php include 'footer.php' ?>
