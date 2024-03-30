<?php
include 'set_session1.php';
// Assuming you have established a database connection
include('includeupwork\db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $video_id = $_POST['video_id'];
    $myTextarea = $_POST['myTextarea'];

    // Perform any necessary validation or sanitization on the data

    // Get the current time
    $current_time = date('Y-m-d H:i:s');

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO user_notes (video_id, user_id, notes, created_at) VALUES ($1, $2, $3, $4)";

    // Prepare the statement
    $stmt = pg_prepare($connection, "insert_note", $sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $result = pg_execute($connection, "insert_note", array($video_id, $userid, $myTextarea, $current_time));

        if ($result) {
            // Fetch the newly inserted note from the database
            $fetchSql = "SELECT * FROM user_notes WHERE id = LASTVAL()";
            $fetchResult = pg_query($connection, $fetchSql);
            $newNoteData = pg_fetch_assoc($fetchResult);

            // Prepare the response data
            $response = array(
                'note' => $newNoteData['notes'],
                'timestamp' => $newNoteData['created_at']
            );

            // Send the response as JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Error occurred during execution
            echo "Error executing the prepared statement.";
        }
    } else {
        // Error occurred during preparation
        echo "Error preparing the statement.";
    }
}
?>
