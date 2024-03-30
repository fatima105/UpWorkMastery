<?php
include('includeupwork/db.php');
session_start();

$email = $_SESSION['email']; // Get the email from the session
$password = pg_escape_string($_POST['password']); // Get the password from the form submission and escape it
$password1 = pg_escape_string($_POST['password1']); // Get the password confirmation from the form submission and escape it

// Prepare the SELECT query to check if the email exists in the database
$query = "SELECT * FROM users WHERE email = $1";
$stmt = pg_prepare($connection, "check_email", $query);
$result = pg_execute($connection, "check_email", array($email));

// Check if the email exists in the database
if (pg_num_rows($result) > 0) {
    // Email exists, proceed with the password update process

    if ($password1 == $password) {
        // Passwords match
        // Update the password in the database
        $query = "UPDATE users SET password = $1 WHERE email = $2";
        $stmt = pg_prepare($connection, "update_password", $query);
        $result = pg_execute($connection, "update_password", array($password, $email));

        if ($result) {
            // Password updated successfully
            $response = array('success' => true, 'message' => 'Password updated.');
            echo json_encode($response);
        } else {
            // Failed to update password
            $response = array('success' => false, 'message' => 'Failed to update password.');
            echo json_encode($response);
        }
    } else {
        // Passwords do not match
        $response = array('success' => false, 'message' => 'Passwords do not match.');
        echo json_encode($response);
    }
} else {
    // Email does not exist in the database
    $response = array('success' => false, 'message' => 'Invalid email.');
    echo json_encode($response);
}
?>
