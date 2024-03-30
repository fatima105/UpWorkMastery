	<?php 
	include'set_session1.php';
?>
<!doctype html>
<html lang="en">


<head>
	<?php include('includeupwork/db.php');?>
<?php include('includeupwork/scripts.php');?>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<?php include('includeupwork/sidebar.php');?>
		<!--end sidebar wrapper -->
		<!--start header -->
		<?php include('includeupwork/header.php');?>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				 <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Update Profile</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i
                                            class="bx bx-user"></i></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
	<div class="row">
					<div class="col-12 col-md-6 mx-auto">
						
					


						<div class="card">
							<div class="card-body p-4">
								<h5 class="mb-4 text-center">Update Profile</h5>
								<form  class="row g-3">
									<div class="col-md-12 col-12s">
										<label for="input25" class="form-label">First Name</label>
										 <div class="input-group">
											<span class="input-group-text"><i class='bx bx-user'></i></span>
											<input  required  type="text" class="form-control" id="first_name" value="<?php echo $first_name;?>"name="firstname" placeholder="First Name">
										  </div>
									</div>
									<div class="col-md-12">
										<label for="input26" class="orm-label">Last Name</label>
										<div class="input-group">
											<span class="input-group-text"><i class='bx bx-user'></i></span>
											<input required  value="<?php echo $last_name;?>" type="text" class="form-control" id="last_name" name="lastname"placeholder="Last Name">
										  </div>
									</div>
									<div class="col-md-12">
										<label for="input27" class="form-label">Email</label>
										<div class="input-group">
											<span class="input-group-text"><i class='bx bx-envelope'></i></span>
											<input required type="text" value="<?php echo $_SESSION['email'];?>" readonly class="form-control" id="email"
											placeholder="Email">
										  </div>
									</div>
								
									
									
									<div class="col-md-12">
										<div class="text-center">
											<button id="submitBtn"type="submit" class="btn btn-success px-4">Update Profile</button>
											
										</div>
									</div>
								</form>
							</div>
						</div>


					</div>
				</div>
					</div>
					<?php include('includeupwork/footer.php');?>
						</div>	<!-- Bootstrap JS -->


	 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#submitBtn').click(function() {
      var firstName = $('#first_name').val();
      var lastName = $('#last_name').val();
      var email = $('#email').val();

      // Validate input
      if (!firstName || !lastName || !email) {
        Lobibox.notify('error', {
          pauseDelayOnHover: true,
          continueDelayOnInactiveTab: false,
          position: 'top right',
          icon: 'bx bx-check-circle',
          msg: 'Please Fill All Fields' // Display your custom error message
        });
        return;
      }

      // Prepare data
      var data = {
        first_name: firstName,
        last_name: lastName,
        email: email
      };

      console.log('Data:', data);

      // Send AJAX request
      $.ajax({
        url: 'update_user.php',
        type: 'POST',
        data: data,
        success: function(response) {
          console.log('Response:', response);
          Lobibox.notify('success', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-check-circle',
            msg: response // Display the response message from the server
          });
        },
        error: function(xhr, status, error) {
          console.log('Error:', xhr.responseText);
          Lobibox.notify('error', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-check-circle',
            msg: 'Unable to Update User' // Display your custom error message
          });
        }
      });
    });
  });
</script>



<?php include('includeupwork/footerscripts.php');?>
</body>



</html>