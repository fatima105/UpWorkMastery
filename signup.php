<?php 

session_start();
?>

<!-- Include Stripe.js -->
<script src="http://js.stripe.com/v3/"></script>
<script>
	console.log("hi");
  // Parse session ID from the URL
  const urlParams = new URLSearchParams(window.location.search);
  const sessionId = urlParams.get('session_id');
  console.log('Session ID:', sessionId);
console.log('Session ID:', sessionId);
console.log("heyyyi"+session);
  // Initialize Stripe with your publishable key
  const stripe = Stripe('pk_test_51Ml3wJGui44lwdb4K6apO4rnFrF2ckySwM1TfDcj0lVdSekGOVGrB1uHNlmaO7wZPxwHfRZani73KlHQKOiX4JmK00E0l7opJO');
  console.log("hi"+session);
  // Fetch session details from Stripe
  stripe.checkout.sessions.retrieve(sessionId).then(session => {
    // Check if customer_details and email are available
	console.log("hi"+session);
    if (session.customer_details && session.customer_details.email) {
      const customerEmail = session.customer_details.email;
      console.log('Session ID:', sessionId);
      // Prefill email input field
      const emailInput = document.getElementById('EmailAddress');
      emailInput.value = customerEmail;
    } else {
      console.log("Email not available in session details.");
    }
  });
</script>


<style>
        /* Add CSS styles here for better formatting */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #34DD13;
            padding: 20px;
            text-align: center; /* Center-aligns text within the container */
        }
        img {
            max-width: 150px;
            display: block;
            margin: 0 auto;
        }
        hr {
            border: none;
            border-top: 1px solid #ccc;
        }
        p {
            text-align: left; /* Left-aligns most of the text */
            color: #333333;
            line-height: 1.5;
        }
        strong {
            font-weight: bold;
        }
        .footer {
            text-align: center; /* Center-aligns the footer text */
            color: #888888;
            margin-top: 20px;
        }
    </style>
	<script>
		  var storedEmail = localStorage.getItem("userEmail");
		  console.log(storedEmail);
		  ?>
	<?php

include_once("includeupwork/db.php");
$emailuser= $_SESSION['emailUser'];





    if (isset($emailuser)) {
 
		
	 $sql = "UPDATE users SET status = 'successful' WHERE email ='$emailuser'";

    $stmt = pg_query($connection,$sql);
    }
	
	
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tsl"; // Use "ssl" instead of "tls"
$mail->Port = 587; // Use integer value for port
$mail->Username = "testing.mtechub@gmail.com";
$mail->Password = "swkekysrjpafbxpx";
$mail->Subject = "Congratulations Buying Course- Upwork Mastery";
$mail->setFrom('no-reply@UpworkMastery.com');
$mail->addAddress($emailuser);
$mail->Body = "Congratualtions";
$mail->isHTML(true);
$emailuser=$emailuser;
$emailuserBody = '
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container">
<table style="background-color: #34DD13; padding: 20px; align="center" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center">
			<img src="images/logo.png" alt="Your Logo">
		</td>
	</tr>
</table>
<hr>
<h3 style="text-align: center;"><strong>Welcome!</strong></h3>
<h3 style="text-align: center;"><strong>You\'ve just subscribed to the Upwork Mastery Course.</strong></h3>
<p>
	Thank you for choosing Upwork Mastery.
</p>
<p>
	You\'ve successfully completed your payment, and your course access is a one-time payment, granting you lifetime access to the course content.
</p>
<p>
	If you have any questions or encounter any issues, our dedicated support team is here to assist you. Please feel free to reach out to us at <a href="mailto:support@gmail.com" style="color: #007bff; text-decoration: none;">support@gmail.com</a>.
</p>
<p>
	To get started with your course, please log in to your user portal by following this link: <a href="https://example.com">User Portal</a>
</p>
<div style="text-align: center;" class="footer">
	All rights reserved &copy; M TECHUB LLC
</div>
</div>
</body>
</html>
';

$mail->msgHTML($emailuserBody);

if ($mail->send()) {
   
} else {
  
}








$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tsl"; // Use "ssl" instead of "tls"
$mail->Port = 587; // Use integer value for port
$mail->Username = "testing.mtechub@gmail.com";
$mail->Password = "swkekysrjpafbxpx";
$mail->Subject = "Congratulations Buying Course- Upwork Mastery";
$mail->setFrom('no-reply@UpworkMastery.com');
$mail->addAddress($emailuser);
$mail->Body = "Congratualtions";
$mail->isHTML(true);
$emailuser=$emailuser;
$emailuserBody = '
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 20px;">
    <h1>Invoice</h1>
    <p>Dear Customer,</p>
  
    <p>Thank you for Choosing Upwork Mastery. You successfully paid the course fee.</p>
    <small> Invoice is attached below</small>
	<table style="background-color: #96C291; width: 100%; border-collapse: collapse; border: 1px solid #ccc;">
    <thead>
        <tr>
            <th style="border: 1px solid #ccc; padding: 10px; text-align: center;">Description</th>
            <th style="border: 1px solid #ccc; padding: 10px; text-align: center;">Quantity</th>
            <th style="border: 1px solid #ccc; padding: 10px; text-align: center;">Price</th>
            <th style="border: 1px solid #ccc; padding: 10px; text-align: center;">Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px; text-align: center;">Upwork Mastery Course</td>
            <td style="border: 1px solid #ccc; padding: 10px; text-align: center;">1</td>
            <td style="border: 1px solid #ccc; padding: 10px; text-align: center;">$90</td>
            <td style="border: 1px solid #ccc; padding: 10px; text-align: center;">$90</td>
        </tr>
    </tbody>
</table>

    
    <p style="margin-top: 20px;">Total Amount: $90</p>
    
	<p>
	You\'ve successfully completed your payment, and your course access is a one-time payment, granting you lifetime access to the course content.
</p>
<p>
	If you have any questions or encounter any issues, our dedicated support team is here to assist you. Please feel free to reach out to us at <a href="mailto:support@gmail.com" style="color: #007bff; text-decoration: none;">support@gmail.com</a>.
</p>
<p>
	To get started with your course, please log in to your user portal by following this link: <a href="https://example.com">User Portal</a>
</p>
<div style="text-align: center;" class="footer">
	All rights reserved &copy; M TECHUB LLC
</div>
</body>
</html>
';

$mail->msgHTML($emailuserBody);

if ($mail->send()) {
   
} else {
  
}
?>

<!doctype html>
<html lang="en">


<head>

    <?php  include('includeupwork/scripts.php');?>



</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5">
			<div class="container-fluid">

				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
				<?php
    if (isset($_SESSION['message'])) {
?>
<div class="alert alert-info border-0 bg-info alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-dark"><i class='bx bx-info-square'></i></div>
        <div class="ms-3">
            <h6 class="mb-0 text-dark"></h6>
            <div class="text-dark"><?php echo $_SESSION['message']; ?></div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php 
    unset($_SESSION['message']); // Unset the session variable 'message' after displaying the message
} 
?>
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-3 text-center">
										<img src="assets/images/logo-icon.png" width="200px" height="auto" alt="" />
									</div>
									<div class="form-body">
										<form action="updateprofileuser.php" method="POST"class="row g-3">
											<div class="col-12">
												<label for="inputUsername" class="form-label">First Name</label>
												<input required type="name" class="form-control" name="first_name" id="inputUsername" placeholder="">
											</div>
											<div class="col-12">
												<label for="inputUsername" class="form-label">Last Name</label>
												<input  required  type="name" class="form-control" name="last_name"  placeholder="">
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input  required  type="email" class="form-control"  id="EmailAddress" name="email" value="<?php echo isset($emailuser) ? $emailuser : ''; ?>" placeholder="">

											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input value="" required type="password" name="password"class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											
											<div class="col-12">
												<div class="form-check form-switch">
													<input value="" required class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-success">Sign up</button>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<a href="index.php" class="btn btn-success">Register Now</a>
												</div>
											</div>
											<div class="col-12">
											
											</div>
										</form>
									</div>
								
									</div>
									

								</div>
							</div>
						</div>
					</div>
				 </div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->

						</div>	<!-- Bootstrap JS -->
<?php include('includeupwork/footerscripts.php');?>

	<!--Password show & hide js -->
	<script>
	$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>
