<html>
<body>
<p>This php page sends the data collected in the form.html file and inserts it into the MySQL database</p>

<?php
$database = "IT210";
$table = "Users";

//Note that you'll need to update your username and password below
$db_handle = mysql_connect("localhost","root","ilovemovies1");
$db_found = mysql_select_db($database);

//If the database is found, then this inserts values from the form.html
//into the database, otherwise it prints "Database NOT Found
if ($db_found){
   print "Database Found <br />";
   mysql_query("INSERT INTO $table (username, password, loggedin)
   VALUES ('$_POST[username]','$_POST[password]')");
}

else {
   print "Database NOT Found";
}

mysql_close($db_handle);

//As a challenge you can try and have it check if the records were actually added
//and if not, have it send an error message instead of the "One record added" message
?>

</body>
</html>