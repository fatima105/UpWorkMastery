<?php
include 'set_session1.php';
?>
<!doctype html>
<html lang="en">


<head>
  <?php include('includeupwork/db.php'); ?>
  <?php include('includeupwork/scripts.php'); ?>
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
    <?php include('includeupwork/sidebar.php'); ?>
    <!--end sidebar wrapper -->
    <!--start header -->
    <?php include('includeupwork/header.php'); ?>
    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3 text-dark">Contact Admin</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="fadeIn animated bx bx-envelope"></i></a>
                </li>

              </ol>
            </nav>
          </div>

        </div>


        <div class="card">
          <div class="card-body p-4">

            <div class="container-fluid">
              <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                  <div class="card mb-0">
                    <div class="card-body">
                      <div class="p-4">
                        <div class="mb-3 text-center">
                          <img src="images/logo.png" width="100" height="auto" alt="" />
                        </div>

                        <div id="reportbox" class="form-body">
                          <form id="contactusform" class="row g-3">
                            <div class="col-12">
                    
                              <label for="inputEmailAddress" class="form-label">Subject</label>
                              <input type="text" name="subject" required class="form-control" id="text">
                            </div>
                            <div class="col-12">
                              <label for="" class="form-label">Description</label>
                              <textarea type="text" name="description" required class="form-control" rows="3"
                                id="description"></textarea>
                            </div>
                            <div class="col-12">
                              <div class="d-grid">
                                <button type="submit" class="btn btn-danger">Report</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="email-sidebar-header d-grid">
                          <a href="#" class="btn btn-success compose-mail-btn" data-bs-toggle="modal"
                            data-bs-target="#composeMailModal">
                            <i class='bx bx-plus me-2'></i>Contact Us on Email
                          </a>


                          <div class="modal fade" id="composeMailModal" tabindex="-1"
                            aria-labelledby="composeMailModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="composeMailModalLabel">Compose Mail</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <!-- Add your email form or content here -->
                                  <form id="email-form" class="email-form">

                                    <div class="mb-3">
                                      <input type="text" value="" required class="form-control" name="subject"
                                        placeholder="Subject" />
                                    </div>
                                    <div class="mb-3">
                                      <textarea class="form-control" required placeholder="Message" name="description" value=""
                                        rows="10" cols="10"></textarea>
                                    </div>
                                    <div class="mb-0">
                                      <div class="d-flex align-items-center">


                                        <div id="loader" class="loader text-end" style="display: none;">

                                          <div class="spinner-grow text-success" role="status"> <span
                                              class="visually-hidden">Loading...</span>
                                          </div>
                                        </div>

                                        <div class="ms-auto">
                                          <button type="submit" class="btn border-3 bg-success btn-sm btn-white"><i
                                              class="lni lni-send">Send</i>
                                          </button>

                                        </div>
                                      </div>
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

             





            </div>
          </div>
        </div>
        <?php include('includeupwork/footer.php'); ?>
      </div> <!-- Bootstrap JS -->
      <?php include('includeupwork/footerscripts.php'); ?>
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
        $(document).ready(function () {
          function toggleReportBox() {
            var reportBox = document.getElementById("reportbox");
            if (reportBox.style.display === "none") {
              reportBox.style.display = "block";
            } else {
              reportBox.style.display = "none";
            }
          }

          $(document).ready(function () {


            $('#email-form').submit(function (event) {
              event.preventDefault(); // Prevent default form submission

              var formData = $(this).serialize();
              $('#loader').show();
              $('button[type="submit"]').hide();
              $.ajax({
                type: 'POST',
                url: 'email-form.php',
                data: formData,
                success: function (response) {
                  $('#loader').hide();
                  $('#email-form')[0].reset();
                  $('button[type="submit"]').show();
                  // Handle the AJAX response
                  console.log(response);
                  var errorNotification = Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    icon: 'bx bx-check-circle',
                    msg: 'Your Report Sent Through Email'  // Display your custom error message
                  });
                },
                error: function (xhr, status, error) {
                  $('#loader').hide();
                  $('button[type="submit"]').show();
                  // Handle AJAX errors
                  console.log(xhr.responseText);
                  var errorNotification = Lobibox.notify('error', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    icon: 'bx bx-check-circle',
                    msg: 'Failed to Sent Mail' // Display your custom error message
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

            // Clear the form fields
            $('#contactusform')[0].reset();

            var successNotification = Lobibox.notify('success', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bx bx-check-circle',
                msg: 'Report Added' // Display your custom success message
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