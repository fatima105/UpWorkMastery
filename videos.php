<?php 
    include 'set_session1.php';
?>
<!doctype html>
<html lang="en">

<head>
    <?php include 'includeupwork/db.php';?>
    <?php include 'includeupwork/scripts.php';?>
    <style>
        .btn.active {
  background-color: green;
}
   /* CSS to style the widget box */
    .widgets-icons {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px; /* Adjust the width to your desired size */
        height: 30px; /* Adjust the height to your desired size */
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* CSS to make the icons smaller */
    .widgets-icons i {
        font-size: 14px; /* Adjust the font size to your desired size */
    }

 
    </style>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <?php include 'includeupwork/sidebar.php';?>
        <!--end sidebar wrapper -->
        <!--start header -->
        <?php include 'includeupwork/header.php';?>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Course Videos</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i
                                            class="bx bx-video-recording"></i></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row" style="display:none;">

</div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 col-xl-12 d-flex justify-content-between">
                                        <form class="float-lg-center">
                                            <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                                <div class="col">
                                                    <div class="position-relative">
                                                        <input id="searchInput" type="text"
                                                            class="form-control ps-5" placeholder="Search Video Title">
                                                        <span
                                                            class="position-absolute top-50 product-show translate-middle-y"><i
                                                                class="bx bx-search"></i></span>
                                                    </div>
                                                </div>
                                           
                                            </div>
                                        </form>
                                        <div id="viewButton" class="btn-group-end">
   <a href="videos.php?type=grid" id="btnViewGrid" class="btn btn-white px-1 <?php echo isset($_GET['type']) && $_GET['type'] == "grid" ? "active" : ""; ?>">
  <i id="viewIconGrid" class="fadeIn animated bx bx-grid-small"></i>
</a>
<a href="videos.php" id="btnViewList" class="btn btn-white px-1 <?php echo !(isset($_GET['type']) && $_GET['type'] == "grid") ? "active" : ""; ?>">
  <i id="viewIconList" class="fadeIn animated bx bx-list-ol"></i>
</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php if (isset($_GET['type']) && $_GET['type'] == "grid") { ?>
    <div id="videoContainer" class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
        <?php
        $sql = "SELECT * from videos";
        $myquery = pg_query($connection, $sql);
        while ($row = pg_fetch_assoc($myquery)) {
            $id = $row['id'];
            $video_link = $row['video_link'];
            parse_str(parse_url($video_link, PHP_URL_QUERY), $my_array_of_vars);
        ?>
            <!-- HTML code for displaying the video thumbnail -->
            <a style="text-decoration: none; color: inherit;" href="myvideo.php?video_id=<?php echo $id; ?>">
                <div class="video-item col">
                    <div class="card">
                        <img class="video-bttn position-relative d-block" src="https://img.youtube.com/vi/<?php echo $my_array_of_vars['v'] ?>/0.jpg" />
                        <div class="card-body">
                            <div class="d-flex align-items-center mt-3 fs-6">
                                <h6 class="card-title cursor-pointer me-auto"><?php echo $row['title']; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php
        }
        ?>
    </div><!-- end videoContainer -->
<?php } else { ?>
    <div class="row">
        <hr />
        <div id="videoList" class="row row-cols-12 row-cols-md-12 row-cols-xl-12">
            <?php
            $sql = "SELECT * from videos";
            $myquery = pg_query($connection, $sql);
            $hasRecords = false; // Variable to track if there are any records found
            while ($row = pg_fetch_assoc($myquery)) {
                $id = $row['id'];
                $video_link = $row['video_link'];
                parse_str(parse_url($video_link, PHP_URL_QUERY), $my_array_of_vars);
                $hasRecords = true; // Set the flag to indicate that records are found
            ?>
                <div class="video-item col-12">
                    <div class="card radius-10 bg-light bg-gradient">
                        <div class="card-body">
    <div class="d-flex align-items-center">
        <a href="myvideo.php?video_id=<?php echo $id; ?>">
            <p class="mb-0 text-dark fs-5 card-title mr-2"><?php echo $row['title']; ?></p>
            <?php if (isset($_SESSION['email']) && $_SESSION['email'] === 'admin@gmail.com') { ?>
            <br>   <div class="text-center">
    <span class="d-flex justify-content-center">
        <a href="deletevideofile.php?id=<?php echo $row['id']; ?>" class="widgets-icons text-danger me-2">
            <i class="bx bxs-trash text-sm"></i>
        </a>
        <a href="editvideos.php?id=<?php echo $row['id']; ?>" class="widgets-icons text-success">
            <i class="bx bxs-edit text-sm"></i>
        </a>
    </span>
</div>
            <?php } ?>
        </a>

                                <div class="text-white ms-auto font-35">
                                    <img src="https://img.youtube.com/vi/<?php echo $my_array_of_vars['v'] ?>/0.jpg" width="100" height="100" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <?php if (!$hasRecords) : ?>
                <!-- Display the "No records found" row if no records are found -->
                <div class="no-records-row col-12 text-center bg-light-success fs-5" style="background-color: rgba(23, 20, 14, 0.11); padding: 10px;">
                    No records found.
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php } ?>
        </div>

        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <?php include 'includeupwork/footer.php';?>
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <?php include 'includeupwork/footerscripts.php';?>
    <script>
  $(document).ready(function() {
  // Get the input element for search
  var searchInput = $('#searchInput');

  // Get the list view and grid view containers
  var listViewContainer = $('#videoList');
  var gridViewContainer = $('#videoContainer');

  // Create the "No records found" row element
  var noRecordsRow = $('<div class="row no-records-row text-start fs-5">No records found.</div>');

  // Store the original video items
  var originalListViewItems = listViewContainer.find('.video-item');
  var originalGridViewItems = gridViewContainer.find('.video-item');

  // Handle input change event
  searchInput.on('input', function () {
    var searchText = $(this).val().trim().toLowerCase();

    // Get all the video items in the list view
    var listViewItems = originalListViewItems.clone();

    // Filter the list view video items based on search text
    var visibleListItems = listViewItems.filter(function () {
      var videoTitle = $(this).find('.card-title').text().toLowerCase();
      return videoTitle.includes(searchText);
    });

    // Show/hide the list view video items and "No records found" row
    if (visibleListItems.length === 0) {
      listViewContainer.empty().append(noRecordsRow);
    } else {
      listViewContainer.empty().append(visibleListItems);
    }

    // Get all the video items in the grid view
    var gridViewItems = originalGridViewItems.clone();

    // Filter the grid view video items based on search text
    var visibleGridViewItems = gridViewItems.filter(function () {
      var videoTitle = $(this).find('.card-title').text().toLowerCase();
      return videoTitle.includes(searchText);
    });

    // Show/hide the grid view video items and "No records found" row
    if (visibleGridViewItems.length === 0) {
      gridViewContainer.empty().append(noRecordsRow);
    } else {
      gridViewContainer.empty().append(visibleGridViewItems);
    }
  });
});



    </script>
</body>

</html>
