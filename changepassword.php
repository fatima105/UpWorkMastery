<!doctype html>
<html lang="en">


<head>
		<?php include('includeupwork/db.php');?>
<?php include('includeupwork/scripts.php');?>
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
										
										<p class="mb-0">Please log in to your account</p>
									</div>
									<div class="form-body">
										<form  id="loginForm"  class="row g-3">
											
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input value="" required type="password" name="password"class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
												<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Confirm Password</label>
												<div class="input-group" id="show_hide_password1">
													<input value=""required type="password" name="password1"class="form-control border-end-0" id="inputChoosePassword1" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-success">Sign in</button>
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

$(document).ready(function() {
  $('#loginForm').submit(function(e) {
    e.preventDefault(); // Prevent the default form submission behavior

    // Serialize the form data
    var formData = $(this).serialize();
    console.log(formData);

    // Send an Ajax POST request
    $.ajax({
      url: 'changepasswordcheck.php',
      type: 'POST',
      data: formData,
      dataType: 'json', // Expect JSON response
      success: function(response) {
        // Handle the response from the server
        console.log(response);

        if (response.success) {
          // Login successful
          Lobibox.notify('success', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-check-circle',
            msg: response.message // Display the message from the server response
          });

         
  window.location.href = 'signin.php'// Redirect to another page
} else {
          // Login failed
          Lobibox.notify('error', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-check-circle',
            msg: response.message // Display the message from the server response
          });
        }
      },
      error: function(xhr, status, error) {
        // Handle any errors that occur during the Ajax request
        console.log('An error occurred during the Ajax request.');
        console.log(xhr.responseText); // Log the error response
        alert('An error occurred during the login request.'); // Replace with your desired action (e.g., display error message)
      }
    });
  });
});



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
			$("#show_hide_password1 a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password1 input').attr("type") == "text") {
					$('#show_hide_password1 input').attr('type', 'password');
					$('#show_hide_password1 i').addClass("bx-hide");
					$('#show_hide_password1 i').removeClass("bx-show");
				} else if ($('#show_hide_password1 input').attr("type") == "password") {
					$('#show_hide_password1 input').attr('type', 'text');
					$('#show_hide_password1 i').removeClass("bx-hide");
					$('#show_hide_password1 i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>


<!-- Mirrored from codervent.com/syndron/demo/vertical/auth-basic-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jul 2023 07:01:52 GMT -->
</html>