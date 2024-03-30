<?php
include('set_session1.php');
include('includeupwork/db.php');

$response = array(); // Initialize the response array

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $confirmpassword = $_POST['confirmpassword'];
  $newpassword = $_POST['newpassword'];
  $oldpassword = $_POST['oldpassword'];

  // Log the received data to the console
  error_log('Received Data:');
  error_log('Confirm Password: ' . $confirmpassword);
  error_log('New Password: ' . $newpassword);
  error_log('Old Password: ' . $oldpassword);

  $sql = "SELECT * FROM users WHERE password = '$oldpassword' AND id = '$userid'";
  $myquery = pg_query($connection, $sql);

  if (pg_num_rows($myquery) <= 0) {
    $response['success'] = false;
    $response['message'] = "Old password is wrong";
  } elseif ($newpassword != $confirmpassword) {
    $response['success'] = false;
    $response['message'] = "Confirm Password and New Password do not match";
  } else {
    $updateSql = "UPDATE users SET password = '$newpassword' WHERE id = '$userid'";
    $updateQuery = pg_query($connection, $updateSql);

    if ($updateQuery) {
      $response['success'] = true;
      $response['message'] = "Password Updated";
    } else {
      $response['success'] = false;
      $response['message'] = "Failed to update password";
    }
  }

  // Convert the response array to JSON format
  $jsonResponse = json_encode($response);

  // Send the JSON response
  header('Content-Type: application/json');
  echo $jsonResponse;

  exit(); // Stop script execution after sending the response
}
?>
