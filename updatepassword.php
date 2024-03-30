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
    <div class="row">
                    <div class="col-12 col-md-6 mx-auto">
                        
                    


                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="mb-4 text-center">Update Password</h5>
                                <form id="password"   class="row g-3">
                                     <div class="col-12">
                                                <label for="inputChoosePassword" class="mt-2 form-label"> Old Password</label>
                                                <div class="input-group" id="show_hide_password1">
                                                    <input value="" required type="password" name="oldpassword"class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="mt-2 form-label">New Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input value="" required type="password" name="newpassword"class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="mt-2 form-label">Confirm Password</label>
                                                <div class="input-group " id="show_hide_password2">
                                                    <input value="" required type="password" name="confirmpassword"class="form-control mb-1 border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                           
                                            <div class="col-12 mt-1">
                                                <div class="d-grid">
                                                    <button type="submit" name="update" class="btn btn-success">Update Password</button>
                                                </div>
                                            </div>
                                            <!-- div class="col-12">
                                                <div class="text-center ">
                                                    <p class="mb-0">Don't have an account yet? <a href="auth-basic-signup.html">Sign up here</a>
                                                    </p>
                                                </div>
                                            </div> -->
                                        </form>
                            </div>
                        </div>


                    </div>
                </div>
                    </div>
                    <?php include('includeupwork/footer.php');?>
                        </div>  <!-- Bootstrap JS -->


     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     $('#password').submit(function(e) {
    e.preventDefault(); // Prevent the default form submission behavior

    // Serialize the form data
    var formData = $(this).serialize();
    console.log(formData);

    // Send an Ajax POST request
    $.ajax({
      url: 'update_pass.php',
      type: 'POST',
      data: formData,
       // Expect JSON response
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
            msg: 'Password Updated' // Display the message from the server response
          });

         


} else {
     console.log(response);
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
  $(document).ready(function() {
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
              $("#show_hide_password2 a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password2 input').attr("type") == "text") {
                    $('#show_hide_password2 input').attr('type', 'password');
                    $('#show_hide_password2 i').addClass("bx-hide");
                    $('#show_hide_password2 i').removeClass("bx-show");
                } else if ($('#show_hide_password2 input').attr("type") == "password") {
                    $('#show_hide_password2 input').attr('type', 'text');
                    $('#show_hide_password2 i').removeClass("bx-hide");
                    $('#show_hide_password2 i').addClass("bx-show");
                }
            });
        });
  });
    var successNotification = Lobibox.notify('success', {
      pauseDelayOnHover: true,
      continueDelayOnInactiveTab: false,
      position: 'top right',
      icon: 'bx bx-check-circle',
      msg: 'hi' // Display your custom success message
    });
 <?php if (isset($_SESSION['success'])) { ?>

    var successNotification = Lobibox.notify('success', {
      pauseDelayOnHover: true,
      continueDelayOnInactiveTab: false,
      position: 'top right',
      icon: 'bx bx-check-circle',
      msg: 'hi' // Display your custom success message
    });
 
<?php } ?>
<?php unset($_SESSION['success']); ?>

<?php if (isset($_SESSION['error'])) { ?>

    var errorNotification = Lobibox.notify('error', {
      pauseDelayOnHover: true,
      continueDelayOnInactiveTab: false,
      position: 'top right',
      icon: 'bx bx-check-circle',
      msg: "<?php echo $_SESSION['error']; ?>" // Display your custom error message
    });

<?php } ?>
<?php unset($_SESSION['error']); ?>

</script>



<?php include('includeupwork/footerscripts.php');?>
</body>



</html>