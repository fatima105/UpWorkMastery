<?php
session_start();
include_once("includeupwork/db.php");

if (isset($_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['password'])) {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];

    // Check if the user exists with status 'successful'
    $sql_check_user = "SELECT * FROM users WHERE email = $1 AND status = 'successful'";
    $stmt_check_user = pg_prepare($connection, "check_user", $sql_check_user);

    if ($stmt_check_user) {
        $result_check_user = pg_execute($connection, "check_user", array($email));

        if ($result_check_user && pg_num_rows($result_check_user) > 0) {
            // User with 'successful' status exists, proceed with the update
            $sql_update_user = "UPDATE users SET first_name = $1, last_name = $2, password = $3, status = 'completed' WHERE email = $4";
            $stmt_update_user = pg_prepare($connection, "update_user", $sql_update_user);

            if ($stmt_update_user) {
                $result_update_user = pg_execute($connection, "update_user", array($first_name, $last_name, $password, $email));

                if ($result_update_user) {
                    // User data updated successfully, now fetch the latest video ID
                    $myquery = "SELECT id FROM videos ORDER BY id DESC LIMIT 1";
                    $myvideos = pg_query($connection, $myquery);

                    if ($myvideos && pg_num_rows($myvideos) > 0) {
                        $videoData = pg_fetch_assoc($myvideos);
                        $latestVideoId = $videoData['id'];
                        // Redirect to the myvideos.php page with the latest video ID as a query parameter
                        header("Location: myvideo.php?video_id=$latestVideoId");
                        exit();
                    } else {
                        // Handle the case when no videos are found or the "myvideos.php" page doesn't exist.
                        // For example, redirect to another page or show an error message.
                        header("Location: no_videos_found.php");
                        exit();
                    }
                } else {
                    echo "Error updating user data: " . pg_last_error($connection);
                }
            } else {
                echo "Error preparing SQL statement: " . pg_last_error($connection);
            }
        } else {
         $_SESSION['message']="Kindly Do Subscription Before Using This System";
         header("location:signup.php");
           
        }
    } else {
        echo "Error preparing SQL statement: " . pg_last_error($connection);
    }
}
?>
