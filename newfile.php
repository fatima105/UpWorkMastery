<?php 
	include'set_session1.php';
?>
<!doctype html>
<html lang="en">


<head>
		<?php include('includeupwork/db.php');?>
<?php include('includeupwork/scripts.php');?>
<style>
.custom-list li {
  margin-left: 20px;
}

	</style>
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
					<div class="breadcrumb-title pe-3 text-dark">Contact Admin</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-phone-alt"></i></a>
								</li>
								
							</ol>
						</nav>
					</div>
				
				</div>
	<div class="row">
					<div class="col-12 col-md-12 mx-auto">
						
					


						<div class="card">
							<div class="card-body p-4">
								<h5 class="mb-4 text-center text-success">Contact Admin</h5>
						<strong>
							You Can Contact Via
						</strong>
						<ol class="custom-list">
  <li>
    <button onclick="toggleReportBox()"class="btn btn-success ml-2">
      Form
    </button>
  </li>
  <li>
    <div class="email-sidebar-header d-grid">
      <a href="javascript:;" class="btn btn-success compose-mail-btn">
        <i class='bx bx-plus me-2'></i> Compose
      </a>
    </div>
  </li>
</ol>

			<div class="container" id="reportbox" style="display: none;">
  <div class="row">
    <div class="col-6 mx-auto">
      <form id="contactusform" class="row g-3">
        <div class="col-12">
          <label for="inputEmailAddress" class="form-label">Subject</label>
          <input type="text" name="subject" required class="form-control" id="text">
        </div>
        <div class="col-12">
          <label for="" class="form-label">Description</label>
          <textarea type="text" name="description" required class="form-control" rows="3" id="description"></textarea>
        </div>
        <div class="col-12">
          <div class="d-grid">
            <button type="submit" class="btn btn-danger">Report</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

							</div>
						</div>

	<div class="compose-mail-popup">
						<div class="card">
							<div class="card-header bg-success text-white py-2 cursor-pointer">
								<div class="d-flex align-items-center">
									<div class="compose-mail-title">New Message</div>
									<div class="compose-mail-close ms-auto">x</div>
								</div>
							</div>
							<div class="card-body">
								<form id="email-form"class="email-form">
								
									<div class="mb-3">
										<input type="text" class="form-control" name="subject" placeholder="Subject" />
									</div>
									<div class="mb-3">
										<textarea class="form-control" placeholder="Message"
										name="description"  rows="10" cols="10"></textarea>
									</div>
									<div class="mb-0">
										<div class="d-flex align-items-center">
											
											<div class="ms-2">
												
											</div>
                           <div id="loader" class="loader text-end" style="display: none;">
                             
                             <div class="spinner-grow text-success" role="status"> <span class="visually-hidden">Loading...</span>
                </div>
                           </div>
          
											<div class="ms-auto">
												<button type="submit" class="btn border-3 bg-success btn-sm btn-white"><i class="lni lni-send">Send</i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</form>
							</div>
						</div>
					</div>

	
					</div>
				</div>
					</div>
					<?php include('includeupwork/footer.php');?>
						</div>	<!-- Bootstrap JS -->
<?php include('includeupwork/footerscripts.php');?>
<script>
	       function toggleReportBox() {
  var reportBox = document.getElementById("reportbox");
  if (reportBox.style.display === "none") {
    reportBox.style.display = "block";
  } else {
    reportBox.style.display = "none";
  }
}

	</script>
	<script>
	$(document).ready(function() {
function toggleReportBox() {
  var reportBox = document.getElementById("reportbox");
  if (reportBox.style.display === "none") {
    reportBox.style.display = "block";
  } else {
    reportBox.style.display = "none";
  }
}

$(document).ready(function() {


	 $('#email-form').submit(function(event) {
    event.preventDefault(); // Prevent default form submission
    
    var formData = $(this).serialize();
      $('#loader').show();
    $('button[type="submit"]').hide();
    $.ajax({
      type: 'POST',
      url: 'email-form.php',
      data: formData,
      success: function(response) {
            $('#loader').hide();
    $('button[type="submit"]').show();
        // Handle the AJAX response
        console.log(response);
          var errorNotification = Lobibox.notify('success', {
      pauseDelayOnHover: true,
      continueDelayOnInactiveTab: false,
      position: 'top right',
      icon: 'bx bx-check-circle',
      msg:'Your Report Sent Through Email'  // Display your custom error message
    });
      },
      error: function(xhr, status, error) {
           $('#loader').hide();
    $('button[type="submit"]').show();
        // Handle AJAX errors
        console.log(xhr.responseText);
          var errorNotification = Lobibox.notify('error', {
      pauseDelayOnHover: true,
      continueDelayOnInactiveTab: false,
      position: 'top right',
      icon: 'bx bx-check-circle',
      msg:'Failed to Sent Mail' // Display your custom error message
    });
        
      }

      
    });
  });
  $('#contactusform').submit(function(event) {
    event.preventDefault(); // Prevent default form submission
    
    var formData = $(this).serialize();
    
    $.ajax({
      type: 'POST',
      url: 'reportdata.php',
      data: formData,
      success: function(response) {
        // Handle the AJAX response
        console.log(response);
          var errorNotification = Lobibox.notify('success', {
      pauseDelayOnHover: true,
      continueDelayOnInactiveTab: false,
      position: 'top right',
      icon: 'bx bx-check-circle',
      msg:'Report Added'  // Display your custom error message
    });
      },
      error: function(xhr, status, error) {
        // Handle AJAX errors
        console.log(xhr.responseText);
          var errorNotification = Lobibox.notify('error', {
      pauseDelayOnHover: true,
      continueDelayOnInactiveTab: false,
      position: 'top right',
      icon: 'bx bx-check-circle',
      msg: 'Failed to Add Data' // Display your custom error message
    });
        
      }


    });
  });
});
});



	</script>
</body>



</html>