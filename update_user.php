	<?php 
	include'set_session1.php';
?>
<?php

// Assuming you have established a database connection
include('includeupwork/db.php');
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];

$query = "UPDATE users SET first_name = $1, last_name = $2 WHERE email = $3";
$params = array($firstName, $lastName, $email);

$result = pg_query_params($connection, $query, $params);

if ($result) {
  echo "User updated successfully.";
} else {
  echo "Error updating user: " . pg_last_error($connection);
}

// Close the database connection
pg_close($connection);
?>
