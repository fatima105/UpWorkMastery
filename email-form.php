<?php
include('includeupwork/db.php');
include'set_session1.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$description = $_POST['description'];
$subject = $_POST['subject'];
$email = $_SESSION['email'];

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->Username =  "testing.mtechub@gmail.com";
$mail->Password = "swkekysrjpafbxpx";
$mail->Subject = $subject;
$mail->setFrom('no-reply@jUpworkMastery.com');
$mail->addAddress($email);
$mail->Body = $description;

try {
  $mail->send();
  // Email sent successfully
  $response = array('success' => true, 'message' => 'Report generated successfully.');
  echo json_encode($response);
} catch (Exception $e) {
  // Failed to send email
  $response = array('success' => false, 'message' => 'Error in sending report.');
  echo json_encode($response);
}
?>
