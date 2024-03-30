<?php session_start();
include('includeupwork/db.php');
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];

  $sql = "SELECT * FROM users WHERE email = $1";
  $myquery = pg_query_params($connection, $sql, array($email));

  while ($row = pg_fetch_assoc($myquery)) {
    $email = $row['email'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $userid = $row['id'];
  }
} else {
  header("location:signin.php");
}
?>