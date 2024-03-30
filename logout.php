<?php
session_start();
include('includeupwork/db.php');
$email = $_SESSION['email'];


$myquery = "DELETE FROM logtime WHERE email = '$email'";

// Execute the query
pg_query($connection, $myquery);

// Destroy the session
session_destroy();

// Redirect the user to the login page or any other desired location
header("Location: signin.php");
exit();
?>







