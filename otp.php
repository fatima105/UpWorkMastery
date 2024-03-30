<?php
session_start();
include('includeupwork/db.php');

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = pg_escape_string($_POST['email']); // Get the email from the form submission

// Prepare the SELECT query to check if the email exists in the database
$query = "SELECT * FROM users WHERE email = $1";

// Prepare the statement
$stmt = pg_prepare($connection, "check_credentials", $query);

// Execute the statement
$result = pg_execute($connection, "check_credentials", array($email));

// Check the number of rows returned
$numRows = pg_num_rows($result);

if ($numRows > 0) {
    $rand = rand(9200, 4000);
    $query = "UPDATE users SET otp = $1 WHERE email = $2";
    $stmt = pg_prepare($connection, "update_otp", $query);
    $result = pg_execute($connection, "update_otp", array($rand, $email));

    if ($result) {
        // Store the email in the session
        $_SESSION['email'] = $email;

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls"; // Use "ssl" instead of "tls"
        $mail->Port = "587";
        $mail->Username = "testing.mtechub@gmail.com";
         $mail->Password = "swkekysrjpafbxpx";
        $mail->Subject = "Reset Password - Upwork Mastery";
        $mail->setFrom('no-reply@jUpwork Mastery.com');
        $mail->addAddress($email);
        $mail->Body = "Your OTP for resetting your password on Upwork Mastery is: " . $rand;
        $mail->isHTML(true);

        $emailBody = '
        <html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    </head>
        <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="images/logo.png" alt="Your Logo" class="logo">
                </div>
                <hr>
                <h2 class="text-center text-success">Reset Password</h2>
                <p>Hello <strong>User</strong>,</p>
                <p>Thank you for contacting us. </p>
                <p>Here is your four-digit code:</p>
                <div class="otp-box">' . $rand . '</div>
                <hr>
                <p class="footer">&copy; <span id="currentYear">' . date("Y") . '</span> Upwork Mastery. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
';

$mail->msgHTML($emailBody);
        try {
            $mail->send();
            // OTP email sent successfully
            $response = array('success' => true, 'message' => 'OTP generated successfully.');
            echo json_encode($response);
        } catch (Exception $e) {
            // Failed to send OTP email
            $response = array('success' => false, 'message' => 'Error in sending OTP.');
            echo json_encode($response);
        }
    } else {
        // Failed to update OTP
        $response = array('success' => false, 'message' => 'Failed to generate OTP.');
        echo json_encode($response);
    }
} else {
    // Email does not exist in the database
    $response = array('success' => false, 'message' => 'Invalid email.');
    echo json_encode($response);
}
?>
