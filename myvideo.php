<?php
include 'set_session1.php';
?>
<!doctype html>
<html lang="en">


<head>
  <?php include('includeupwork/scripts.php'); ?>
  <style>
    #player {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 450px;
    }

    .custom-tooltip {
      background-color: #35DD14;
      /* Change the background color to your preference */
      color: #fff;
      /* Change the text color to your preference */
      border: none;
      /* Remove the default border */
      border-radius: 4px;
      /* Add rounded corners */
      font-size: 14px;
      /* Adjust the font size */
      padding: 8px 12px;
      /* Add padding for a better look */
    }

    /* Set the background color and text color of the editor */
    .tox-tinymce {
      background-color: darkblue;
      color: white;
    }

    .dark-blue-theme .tox-tinymce {
      background-color: darkblue;
      color: white;
    }
  </style>
  <style>
    /* Style the scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
      /* Width of the scrollbar */
    }

    /* Track (the empty space) */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
      /* Color of the track */
    }

    /* Handle (the draggable part) */
    ::-webkit-scrollbar-thumb {
      background: #888;
      /* Color of the thumb */
      border-radius: 4px;
      /* Rounded corners */
    }

    /* On hover, make the thumb darker */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
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
    <!--end header -->
    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Course Videos</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-video-recording"></i></a>
                </li>

              </ol>
            </nav>
          </div>

        </div>

        <?php include('includeupwork\db.php');
        ?>

        <div class="row">
          <div class="col-md-9 col-12">
            <div class="card">
              <div id="player"></div>
              <div class="card-body">
                <div class="card-body">
                  <div class="d-flex align-items-center mt-3 fs-6">
                    <h6 id="videotitle" class="card-title cursor-pointer me-auto"></h6>
                    <?php
                    if (isset($_GET['video_id'])) {
                      $id = $_GET['video_id'];
                    }

                    $sql = "SELECT * FROM savevideos WHERE video_id = '$id' AND user_id = '$userid'";
                    $myquery = pg_query($connection, $sql);
                    $video_saved = (pg_num_rows($myquery) > 0);
                    ?>
                    <a type="text" href="savevideos.php?videoid=<?php echo $id; ?>" class="fadeIn animated"
                      data-toggle="tooltip" data-placement="top"
                      title="<?php echo $video_saved ? 'Unsave Watch Later' : 'Add to Watch Later'; ?>">
                      <?php if ($video_saved): ?>
                        <i class="fa-sharp fa-solid fa-bookmark"></i>
                      <?php else: ?>
                        <i class="bx bx-bookmark" style="color: grey;"></i>
                      <?php endif; ?>
                    </a>

                  </div>
                </div>
                <div class="col">
                  <?php $id = $_GET['video_id'];
                  $sql_video = "SELECT * FROM videos WHERE id='$id' LIMIT 1";
                  $myvideo = pg_query($connection, $sql_video);
                  while ($row = pg_fetch_assoc($myvideo)) {
                    $description = $row['description'];
                    $helpingmaterial = $row['helpingmaterial'];
                  } ?>
                  <hr />
                  <div class="card">
                    <div class="card-body">
                      <ul class="nav nav-pills nav-pills-success mb-3" role="tablist">
                        <li class="nav-item mt-1" role="presentation">
                          <a class="nav-link active" data-bs-toggle="pill" href="#success-pills-Description" role="tab"
                            aria-selected="true">
                            <div class="d-flex align-items-center">
                              <div class="tab-icon"><i class='bx bx-Description font-18 me-1'></i>
                              </div>
                              <div class="tab-title">Description</div>

                            </div>

                          </a>

                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" data-bs-toggle="pill" href="#success-pills-Notes" role="tab"
                            aria-selected="false">
                            <div class="d-flex align-items-center">
                              <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                              </div>
                              <div class="tab-title">Notes</div>
                            </div>
                          </a>
                        </li>

                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="success-pills-Description" role="tabpanel">
                          No Data Uploaded
                        </div>
                        <div class="tab-pane fade" id="success-pills-Notes" role="tabpanel">



                          <form id="myForm">
                            <input type="hidden" id="video_id" value="<?php echo $id; ?>">
                            <textarea id="myTextarea"></textarea>

                            <button class="btn btn-success btn-sm  mt-3 btn-end " type="submit"
                              style="float: right;">ADD</button>
                          </form>

                          <div class="col mt-5">
                            <h6 class="mb-0 text-uppercase">Notes</h6>
                            <hr />


                            <ul class="list-group">
                              <?php
                              $_GET['video_id'];
                              $video_id = $_GET['video_id'];
                              $retrieveSql = "SELECT * FROM user_notes WHERE video_id = '$video_id' AND user_id = '$userid' ORDER BY created_at DESC";
                              $myquery = pg_query($connection, $retrieveSql);

                              $prevDate = null; // Initialize the previous date variable
                              

                              // Your previous code to fetch and group data by dates
                              
                              while ($row = pg_fetch_assoc($myquery)) {
                                $currentDate = date('Y-m-d', strtotime($row['created_at']));
                                $formattedDate = date('F j, Y', strtotime($row['created_at'])); // Format the date as "Month day, Year"
                              
                                // If a new date is encountered, display it in the <h3> tag
                                if ($currentDate !== $prevDate) {
                                  if ($prevDate !== null) {
                                    echo '</ul>'; // Close the previous list if not the first date
                                  }
                                  echo '<h4 class="mt-1"style="color: green; font-weight: bold;">' . $formattedDate . '</h4>'; // Display the formatted date with custom CSS
                                  echo '<ul class="list-group">'; // Add Bootstrap class to the <ul> tag
                                }

                                // Display the note for the current date
                                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                                echo $row['notes'];

                                echo '</li>';

                                $prevDate = $currentDate; // Update the previous date
                              }

                              // Don't forget to close the last <ul> tag outside the loop
                              echo '</ul>';
                              ?>
                            </ul>




                          </div>

                        </div>
                        <div class="tab-pane fade" id="success-pills-Helping-Mafterial" role="tabpanel">
                          <p>
                            No Data Uploaded
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-md-3 col-12">
            <div class="card radius-10">
              <div class="card-body">
                <div style="max-height: 700px; overflow-y: auto;overflow-x: hidden;">
                  <ul class="list-unstyled">
                    <?php
                    $sql = "SELECT * from videos ";
                    $myquery = pg_query($connection, $sql);
                    while ($row = pg_fetch_assoc($myquery)) {
                      ?>
                      <a style="text-decoration: none; color: inherit;"
                        href="myvideo.php?video_id=<?php echo $row['id']; ?>">
                        <li class="d-flex align-items-start border-bottom pb-2 mt-3">
                          <div class="flex-grow-1 ms-3">
                            <?php
                            // Extract the YouTube video ID from the video_link
                            $video_link = $row['video_link'];
                            parse_str(parse_url($video_link, PHP_URL_QUERY), $my_array_of_vars);
                            ?>
                            <img src="https://img.youtube.com/vi/<?php echo $my_array_of_vars['v'] ?>/0.jpg" width="250"
                              height="auto" />
                            <?php
                            $title = $row['title'];
                            $time = $row['time'];
                            // Truncate the title to show a limited number of words
                            $maxTitleWords = 5;
                            $words = explode(' ', $title);
                            if (count($words) > $maxTitleWords) {
                              $truncatedTitle = implode(' ', array_slice($words, 0, $maxTitleWords)) . '...';
                            } else {
                              $truncatedTitle = $title;
                            }
                            ?>
                            <h5 class="mt-3  mb-1">
                              <?php echo $truncatedTitle; ?>
                            </h5>
                            <?php
                            // Show a limited number of words for the description
                            $description = $row['description'];
                            $maxDescriptionWords = 20;
                            $descriptionWords = explode(' ', $description);
                            if (count($descriptionWords) > $maxDescriptionWords) {
                              $truncatedDescription = implode(' ', array_slice($descriptionWords, 0, $maxDescriptionWords)) . '...';
                            } else {
                              $truncatedDescription = $description;
                            }
                            ?>
                            <div class="description mt-1 mb-1" style="text-align: justify;">
                              <?php echo $truncatedDescription; ?>
                            </div>
                            <span class="badge badge-pill bg-success text-dark text-left p-1">
                              <?php echo $time; ?>
                            </span>
                            <hr class="mt-2 mb-2 " style="border-width: 4px;">
                          </div>
                          <hr class="mt-1 mb-1">
                        </li>
                      </a>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div><!-- end row -->



      </div>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    <?php include('includeupwork/footer.php'); ?>
  </div>
  <!--end wrapper-->






  <!-- Bootstrap JS -->
  <?php include('includeupwork/footerscripts.php'); ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://www.youtube.com/iframe_api"></script>
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip({
        template: '<div class="tooltip custom-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
      });
    });
    $(document).ready(function () {
      tinymce.init({
        selector: '#myTextarea'
      });
      tinymce.triggerSave();
      $('#myForm').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission behavior

        var textareaLength = $('#myTextarea').val().trim().length;

        if (textareaLength === 0) {
          // Display an error message or perform any necessary validation handling
          var errorNotification = Lobibox.notify('error', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-x-circle',
            msg: 'Text Area Must be Filled!' // Display your custom error message
          });

          setTimeout(function () {
            errorNotification.remove();
          }, 3000);
          return;
        }

        // Update the textarea with the content from the TinyMCE editor


        // Serialize the form data
        var formData = $(this).serialize();
        console.log(formData);

        // Send an Ajax POST request
        $.ajax({
          url: 'notesadd.php',
          type: 'POST',
          data: {
            video_id: $('#video_id').val(),
            myTextarea: $('#myTextarea').val()
          },
          success: function (response) {
            // Handle the response from the server

            console.log("hi" + response);
            var newNote = '<li class="list-group-item d-flex justify-content-between align-items-center">' +
              response.note;
            // Assuming response.timestamp contains the Unix timestamp



            // Append the new list item to the existing list
            $('.list-group').prepend(newNote);

            var successNotification = Lobibox.notify('success', {
              pauseDelayOnHover: true,
              continueDelayOnInactiveTab: false,
              position: 'top right',
              icon: 'bx bx-check-circle',
              msg: 'Notes Added Successfully!' // Display your custom success message
            });

            setTimeout(function () {
              successNotification.remove();
            }, 3000);

            tinymce.get('myTextarea').setContent('');

            // You might also need to reset the regular textarea's value
            $('#myTextarea').val('');
          },
          error: function () {
            // Handle any errors that occur during the Ajax request
            console.log('An error occurred during the Ajax request.');
            var errorNotification = Lobibox.notify('error', {
              pauseDelayOnHover: true,
              continueDelayOnInactiveTab: false,
              position: 'top right',
              icon: 'bx bx-x-circle',
              msg: 'An error occurred during the request.' // Display your custom error message
            });

            setTimeout(function () {
              errorNotification.remove();
            }, 3000);
          }
        });
      });

      tinymce.init({
        selector: '#myTextarea'
      });
    });


    // Function to create the YouTube player
    function createYouTubePlayer(videoId) {
      var player = new YT.Player('player', {
        height: '100%',
        width: '100%',
        videoId: videoId,
        playerVars: {
          autoplay: 1,
          controls: 1,
          showinfo: 0,
          modestbranding: 1,
        },
        events: {
          // You can add additional event handlers here if needed
        }
      });
    }
<?php
if (isset($_GET['video_id'])) {
  $id = $_GET['video_id'];
  $sql_video = "SELECT * FROM videos WHERE id='$id' LIMIT 1";
  $myvideo = pg_query($connection, $sql_video);

  if ($row = pg_fetch_assoc($myvideo)) {
    $id = $row['id'];
    $videolink = $row['video_link'];
    $title = $row['title'];
    $description = $row['description'];
    $helpingmaterial = $row['helpingmaterial'];
  }
} else {
  $sql_video = "SELECT * FROM videos ORDER BY created_at DESC LIMIT 1";
  $myvideo = pg_query($connection, $sql_video);

  if ($row = pg_fetch_assoc($myvideo)) {
    $videolink = $row['video_link'];
    $id = $row['id'];
    $title = $row['title'];
    $description = $row['description'];
    $helpingmaterial = $row['helpingmaterial'];

  }
}
?>
var sql = <?php echo json_encode($sql_video); ?>;
    console.log(sql);
    // Load the YouTube API when the page has finished loading
    window.onload = function () {
      var videoLink = '<?php echo $videolink ?>'; // Replace with your dynamically fetched video link
      document.getElementById("videotitle").textContent = '<?php echo $title ?>';
      document.getElementById("video_id").value = '<?php echo $id ?>';
      var description = '<?php echo $description; ?>';
      var descriptionElement = document.getElementById("success-pills-Description");

      if (description.trim() === '') {
        descriptionElement.textContent = 'No description added by admin.';
      } else {
        descriptionElement.textContent = description;
      }

      var videoId = getYouTubeVideoId(videoLink);
      createYouTubePlayer(videoId);
    };

    // Function to extract the YouTube video ID from the video link
    function getYouTubeVideoId(videoLink) {
      var videoId = '';
      if (videoLink.indexOf('youtube.com') !== -1) {
        var urlParams = new URLSearchParams(new URL(videoLink).search);
        videoId = urlParams.get('v');
      } else if (videoLink.indexOf('youtu.be') !== -1) {
        videoId = videoLink.substr(videoLink.lastIndexOf('/') + 1);
      }
      return videoId;
    }
    var helpingMaterial = '<?php echo $row['helpingmaterial']; ?>';
    var fileExtension = helpingMaterial.split('.').pop();


    var iconClass = '';
    if (fileExtension === 'pdf') {
      iconClass = 'fas fa-file-pdf';
    } else if (fileExtension === 'doc' || fileExtension === 'docx') {
      iconClass = 'fas fa-file-word';
    }

    var htmlString = '<div class="d-flex align-items-center justify-content-start">' +
      '<a style="text-decoration: none;" href="helpingmaterial/' + helpingMaterial + '">' +
      '<li class="d-flex align-items-center border-bottom pb-2">' +
      '<div class="flex-grow-1 ms-3">' +
      '<div class="text-end align-self-start">' +
      '<span class="badge bg-white m-0">'; // Remove the 'text-danger' and 'text-success' classes

    if (iconClass) {
      htmlString += '<i class="' + iconClass + '"></i> ';
    }

    htmlString += '</span>' + // Close the 'span' tag here
      '</div>' +
      '</div>' +
      '</li>' +
      '</a>' +
      '<a href="helpingmaterial/' + helpingMaterial + '" class="btn btn-success btn-lg mt-3" style="float: right;">' +
      '<i class="fas fa-download"></i> Download' + // Add the download icon to the button
      '</a>' +
      '</div>';

    // Assign the HTML string to the desired element
    document.getElementById('success-pills-Helping-Material').innerHTML = htmlString;





    tinymce.init({
      selector: '#myTextarea',
      setup: function (editor) {
        editor.on('init', function () {
          var editorContainer = editor.getContainer();
          editorContainer.classList.add('dark-blue-theme');
        });
      }
    });


  </script>
</body>



</html>