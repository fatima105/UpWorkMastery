<?php
include('includeupwork/db.php');
session_start();
$email = pg_escape_string($connection, $_POST['email']); // Get the email from the form submission and escape it
$password = pg_escape_string($connection, $_POST['password']); // Get the password from the form submission and escape it

// Prepare the SELECT query to check if the email and password exist in the database
$query = "SELECT * FROM users WHERE email = $1 AND password = $2";

// Prepare the statement
$stmt = pg_prepare($connection, "check_credentials", $query);

// Execute the statement
$result = pg_execute($connection, "check_credentials", array($email, $password));

// Check the number of rows returned
$numRows = pg_num_rows($result);

if ($numRows > 0) {
    $row = pg_fetch_assoc($result);
    if ($row['role'] == 'U') {
        $_SESSION['id'] = $row['id'];

        // Email and password exist in the database
        // Proceed with the login process

        // Check if the email is already logged in from another device
        $query = "SELECT * FROM logtime WHERE email = $1";
        $result = pg_query_params($connection, $query, array($email));

        if (pg_num_rows($result) > 0) {
            // User is already logged in from another device
            $response = array('success' => false, 'message' => 'This user is already logged in from another device.');
            echo json_encode($response);
        } else {
            // User is not logged in, proceed with the login

            // Update the last login timestamp or insert a new record
            $currentTimestamp = date('Y-m-d H:i:s');
            $query = "INSERT INTO logtime (email, last_login) VALUES ($1, $2)";
            pg_query_params($connection, $query, array($email, $currentTimestamp));

            // Store the email in the session
            $_SESSION['email'] = $email;

            // Login successful
            $response = array('success' => true, 'message' => 'Login successful.');
            echo json_encode($response);
        }
    } else {
        // Role is not 'U'
        $response = array('success' => false, 'message' => 'Invalid role.');
        echo json_encode($response);
    }
} else {
    // Email and password do not match or do not exist in the database
    $response = array('success' => false, 'message' => 'Invalid email or password.');
    echo json_encode($response);
}
?>
