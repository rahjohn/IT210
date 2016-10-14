<?php
    $currentPage = "";
    include 'header.php';
?>
<header>
    <h1>Contact Me</h1>
</header>
<article>
<form action="contact-post.php" method="post">
	<div class="row">
Your Name:
<br>
<input type="text" name="name" value="<?php echo $_SESSION['name']; ?>"></input><br>
	</div>
	<div class="row">
Your Email:
<br>
<input type="email" name="email" value="<?php echo $_SESSION['email']; ?>"><br>
	</div>
	<div class="row">
Your Subject:
<br>
<input type="text" name="subject"><br>
	</div>
	<div class="row">
Your Message:
<br>
<textarea type="text" class ="input" name="message" rows="7" cols="30"></textarea><br>
	</div>
<!-- Trigger the modal with a button -->
<button type="submit" class="btn btn-info btn-md">Submit</button>
</form>
</article>
<?php
    include 'footer.php'
?>
