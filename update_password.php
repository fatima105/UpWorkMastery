	<?php 
	include'set_session1.php';
?>
<?php
// Assuming you have already established a PostgreSQL database connection
include('includeupwork/db.php');
// Validate input
if (!isset($_POST['password']) || !isset($_POST['confirm_password'])) {
  echo "Please fill in all fields.";
  exit;
}

$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];

// Check if passwords match
if ($password !== $confirmPassword) {
  echo "Passwords do not match.";
  exit;
}

// Hash the password (you can use your preferred method, such as password_hash())
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare the update query
$query = "UPDATE users SET password = $1";

// Execute the update query
$result = pg_query_params($connection, $query, array($hashedPassword));

if ($result) {
  echo "Password updated successfully.";
} else {
  echo "Error updating password: " . pg_last_error($connection);
}

// Close the database connection
pg_close($connection);
?>
