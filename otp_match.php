<!doctype html>
<html lang="en">


<head>
		<?php include('includeupwork/db.php');?>
<?php include('includeupwork/scripts.php');?>
<style>

.row.g-3 [class^="col-"] {
    padding-right: 0;
    padding-left: 0;
}
	</style>
</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-3 text-center">
								<img src="assets/images/logo-icon.png" width="200px" height="auto" alt="" />
									</div>
									<div class="text-center mb-4">
								
										<p class="mb-0">Please Put 4  Digit Otp </p>
									</div>
									<div class="form-body">
										<form id="otp" class="row g-3">
    <div class="col-3">
        <input type="text" name="digit1" required class="form-control otp-input text-center" style="height: 50px; width: 50px; padding: 0;">
    </div>
    <div class="col-3">
        <input type="text" name="digit2" required class="form-control otp-input text-center" style="height: 50px; width: 50px; padding: 0;">
    </div>
    <div class="col-3">
        <input type="text" name="digit3" required class="form-control otp-input text-center" style="height: 50px; width: 50px; padding: 0;">
    </div>
     <div class="col-3">
        <input type="text" name="digit4" required class="form-control otp-input text-center" style="height: 50px; width: 50px; padding: 0;">
    </div>
    <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-success">Forget Password</button>
        </div>
    </div>
</form>


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
// Get all the input fields with the class "otp-input"
const otpInputs = document.querySelectorAll('.otp-input');

// Add an event listener to each input
otpInputs.forEach(input => {
    input.addEventListener('input', restrictInputToSingleDigit);
});

// Function to restrict input to a single digit
function restrictInputToSingleDigit(event) {
    const input = event.target;
    const inputValue = input.value;

    // Remove any non-digit characters from the input value
    const digit = inputValue.replace(/\D/g, '');

    // Set the input value to the single digit
    input.value = digit.slice(0, 1);
}
 $('#otp').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
           var digit1 = $('input[name="digit1"]').val();
        var digit2 = $('input[name="digit2"]').val();
        var digit3 = $('input[name="digit3"]').val();
 var digit4 = $('input[name="digit4"]').val();
        // Combine the digits into a single digit
        var combinedDigit = digit1 + digit2 + digit3+ digit4;
        console.log(combinedDigit);
        // Get the form data
        var formData = $(this).serialize();

        // Make the AJAX request
        $.ajax({
            type: 'POST',
            url: 'checkotp.php', // Replace with the URL to your PHP script that handles the OTP verification
            data: { otp: combinedDigit },
            success: function(response) {
                // Handle the response from the server
                console.log(response); // Log the response for debugging purposes

                // You can perform further actions based on the response
                if (response === 'Correct OTP') {
                	Lobibox.notify('success', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-check-circle',
            msg: 'Otp Matched'// Display the message from the server response
          });
                 window.location.href = 'changepassword.php';   // OTP verification success
                    // Do something
                } else {
                	Lobibox.notify('error', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-check-circle',
            msg:'Wrong Otp'// Display the message from the server response
          });
                    // OTP verification failed
                    // Do something else
                }
            },
            error: function(xhr, status, error) {
                // Handle the error if the AJAX request fails
                console.log(xhr.responseText); // Log the error for debugging purposes
            }
        });
    });



	
	</script>
	<!--app JS-->

	<script src="assets/js/app.js"></script>
</body>


</html>