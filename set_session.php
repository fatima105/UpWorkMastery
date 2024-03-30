<?php
session_start();
// Include necessary PHPMailer classes
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Start a PHP session

// Include the database connection script
include_once("includeupwork/db.php");

// Initialize PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer();
$mail->isSMTP();

// JavaScript for storing email in local storage
if (isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailUser'] = $email;

        // Database operations
        $sql_successful = "SELECT * FROM users WHERE email='$email' AND status='successful'";
        $result_successful = pg_query($connection, $sql_successful);

        $sql_pending = "SELECT * FROM users WHERE email='$email' AND status='pending'";
        $result_pending = pg_query($connection, $sql_pending);

        $sql_completed = "SELECT * FROM users WHERE email='$email' AND status='completed'";
        $result_completed = pg_query($connection, $sql_completed);

        if (pg_num_rows($result_successful) > 0) {
            echo 'true';
        } elseif (pg_num_rows($result_pending) > 0) {
            echo 'pending';
        } elseif (pg_num_rows($result_completed) > 0) {
            echo 'completed';
        } else {
            $date = date('Y-m-d H:i:s');
            $sql_insert = "INSERT INTO users (email, status, time,role) VALUES ('$email', 'pending', '$date', 'U')";

            $result_insert = pg_query($connection, $sql_insert);

            if ($result_insert) {
                echo 'false';
            } else {
                echo 'error';
            }
        }
    } else {
        echo 'invalid_email';
    }
} else {
    echo 'missing_email';
}

?>

