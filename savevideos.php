<?php
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

include('includeupwork/db.php');
include('includeupwork/session_start.php');
$id = $_GET['videoid'];

$sql = "SELECT * FROM savevideos WHERE video_id = '$id' AND user_id = '$userid'";
$myquery = pg_query($connection, $sql);

if (pg_num_rows($myquery) > 0) {
    $sql1 = "DELETE FROM savevideos WHERE video_id = '$id' AND user_id = '$userid'";
    $myquery = pg_query($connection, $sql1);

    if ($myquery) {
        $_SESSION['error'] = "Video Unsaved";
        header("Location: myvideo.php?video_id=$id");
        exit; // Add this to stop further execution
    } else {
        $_SESSION['error'] = "Video Not Unsaved";
        header("Location: myvideo.php?video_id=$id");
        exit; // Add this to stop further execution
    }
} else {
  $sqlinsert = "INSERT INTO savevideos (video_id, user_id) VALUES ('$id', '$userid')";
  $insertquery = pg_query($connection, $sqlinsert);

    if ($insertquery) {
        $_SESSION['message'] = "Video Saved";
        header("Location: myvideo.php?video_id=$id");
        exit; // Add this to stop further execution
    } else {
        $_SESSION['error'] = "Video Not Saved";
        header("Location: myvideo.php?video_id=$id");
        exit; // Add this to stop further execution
    }
}
?>
