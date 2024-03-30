<?php
include 'set_session1.php';
include 'includeupwork/db.php';

// Table name and field names
$tableName = 'report';
$subjectField = $_POST['subject'];
$descriptionField = $_POST['description'];

// Prepare the INSERT statement with placeholders
$insertQuery = "INSERT INTO $tableName (subject, description, email) VALUES ($1, $2, $3)";

// Use pg_prepare to create a prepared statement
$insertResult = pg_prepare($connection, "insert_query", $insertQuery);

if ($insertResult) {
    // Use pg_execute to execute the prepared statement with proper escaping
    $insertResult = pg_execute($connection, "insert_query", array($subjectField, $descriptionField, $email));

    if ($insertResult) {
        $response = array('success' => true, 'message' => 'Report Added');
        echo "Data inserted successfully.";
    } else {
        $response = array('success' => false, 'message' => 'Failed to Add Report');
        echo "Failed to insert data.";
    }
} else {
    echo "Failed to prepare statement.";
}
?>
