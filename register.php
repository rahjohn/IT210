<?php
$currentPage = "";
include 'header.php';
?>
<header>
    <h1>Register</h1>
</header>
<script>
    function validateForm() {
        var x = document.forms["register"]["name"].value;
        var y = document.forms["register"]["username"].value;
        var z = document.forms["register"]["password"].value;
        var zz = document.forms["register"]["confPassword"].value;
        if (x == null || x == "" || y == null || y == "" || z == null || z == "" || zz == null || zz == "") {
            alert("Not all fields are filled out");
            window.location.href = "register.php";
            return false;
        }
    }
</script>
<form name="register" action="register-post.php" onsubmit="return validateForm()" method="post">
Name:
<input id="name" type="text" name="name"><br>
Username:
<input id="username" type="text" name="username"><br>
Email:
<input id="email" type="email" name="email"><br>
Password:
<input id="password" type="password" name="password"><br>
Confirm Password:
<input id="confPassword" type="password" name="confPassword"><br>
<!-- Trigger the modal with a button -->
<button type="submit" class="btn btn-info btn-md">Submit</button>
<?php
include 'footer.php'
?>
