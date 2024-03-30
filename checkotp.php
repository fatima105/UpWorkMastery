<?php
include('includeupwork/db.php');
session_start();

$email = pg_escape_string($_SESSION['email']); // Get the email from the session and escape it
$otp = $_POST['otp']; // Get the OTP from the form submission

// Prepare the SELECT query to check if the email and OTP exist in the database
$query = "SELECT * FROM users WHERE email = $1 AND otp = $2";

// Prepare the statement
$stmt = pg_prepare($connection, "check_credentials", $query);

// Execute the statement
$result = pg_execute($connection, "check_credentials", array($email, $otp));

// Check the number of rows returned
$numRows = pg_num_rows($result);

if ($numRows > 0) {
    $row = pg_fetch_array($result, null, PGSQL_ASSOC);
    $_SESSION['id'] = $row['id'];

    // Update OTP to '0' for the corresponding user
    $query123 = "UPDATE users SET otp = '0' WHERE id = $1";
    $stmt = pg_prepare($connection, "update_otp", $query123);
    $result = pg_execute($connection, "update_otp", array($_SESSION['id']));

    if ($result) {
        $response = 'Correct OTP';
    } else {
        $response = 'Failed to update OTP';
    }
} else {
    // Email and OTP do not match or do not exist in the database
    $response = 'Wrong OTP';
}

echo $response;
?>
