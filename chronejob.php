<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Initialize PHPMailer


// Start a PHP session
session_start();

// Include your database connection file here
include_once("includeupwork/db.php");

// Set response headers


// Check if the user with the provided email exists and has a "pending" status
$sqlCheckTable = "SELECT * FROM users WHERE status='pending' AND email_status ='pending'";
$resultCheckTable = pg_query($connection, $sqlCheckTable);


if (pg_num_rows($resultCheckTable) > 0) {
    while ($row = pg_fetch_assoc($resultCheckTable)) {
        $currentTime = time(); // Get the current Unix timestamp
        $dbStoredTime = strtotime($row['time']); // Convert the stored time from the database to a Unix timestamp
        $timeDifference = $currentTime - $dbStoredTime;
    $email=$row['email'];
        if ($timeDifference >= 1800) {
            $mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tsl"; // Use "ssl" instead of "tls"
$mail->Port = 587; // Use integer value for port
$mail->Username = "testing.mtechub@gmail.com";
$mail->Password = "swkekysrjpafbxpx";
$mail->Subject = "Congratulations Buying Course- Upwork Mastery";
    // Email content
    $mail->setFrom('no-reply@UpworkMastery.com');
    $mail->addAddress($email);
    $mail->Subject = "Reminder for Upwork Mastery Payment";
    $mail->isHTML(true);

    // Email body (HTML)
    $emailBody = '<!DOCTYPE html>
        <html>
        <head>
        <style>
        /* Styles here */
        </style>
        </head>
        <body>
        <div class="card">
        <div class="header">
            Payment Reminder
        </div>
        <div class="content">
            <p>Hello,</p>
            <p>Thank you for registering for the <strong>Upwork Mastery Course</strong>. </p>
            <p>This is a friendly reminder to complete your payment for the course. Your access to the course materials is contingent upon payment.</p>
        </div>
        <div class="spacer"></div>
        <a href="https://buy.stripe.com/test_9AQ16jd6qcnidCUeUW" class="button">Complete Payment</a>
        <div class="spacer"></div>
        <p>If you have any questions or need assistance, please don\'t hesitate to contact our support team at <a href="mailto:support@example.com">support@example.com</a>.</p>
        <p>Thank you for choosing Upwork Mastery!</p>
    </div>
        </body>
        </html>';

    $mail->msgHTML($emailBody);

    if ($mail->send()) {


        $change="UPDATE users
        SET email_status = 'done'
        WHERE email = '$email'";
        $change=pg_query($connection,$change);
        $response = array(
            "message" => "Email sent successfully",
            "error" => false,
            "status" => true
        );
        echo json_encode($response);
    } else {
        $response = array(
            "message" => "Email sending failed: " . $mail->ErrorInfo,
            "error" => true,
            "status" => false
        );
        echo json_encode($response);
    }
} }}else {
    $response = array(
        "message" => "No user found with the provided email and 'pending' status",
        "error" => true,
        "status" => false
    );
    echo json_encode($response);
}

?>
