    <?php 
    include'set_session1.php';
?><?php


include_once("includeupwork/db.php");
$conn = connect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

.footer {
  position: fixed;
margin-left:5px;
margin-bottom:10px;
  bottom: 0;
  width: 100%;

  color: #35DD14;
 
}
.bg-success{
    background-color:#35DD14;
  
    padding:5px;
    border:none;
    border-radius:2px;
}


</style>
</head>

<body class="color-theme-green mont-font">

    <div class="preloader"></div>

    <div class="main-wrapper">
<div class="container-fluid mt-3">
  <div class="row mt-2">
    <div class="col-12  mt-sm-2 col-md-5">
<a href="index.php" style="text-decoration:none; color:white;" class="bg-success mt-3">
    Go Back
</a>
    </div>
    <div class="col-12 mt-sm-2 col-md-7 text-start">
  <img src="images/logo.png" width=200px; />
    </div>
  </div>

        <div class="main-content">
                <div class="middle-sidebar-left">
                    <div class="middle-wrap">

                <div class="container">
                    <div class="row mt-md-5 mt-5">
                        <div class="col-xl-12 col-xxl-12 col-md-12 col-md-12">
                            <div class="card p-4  border-0 shadow-xss rounded-lg ">
                                <div class="card-body ">
                                    <h3 style="color:#25D366; font-weight:bolder;">Privacy Policy</h3>
                                    <?php $sql = "SELECT * FROM privacy_policy where status='active'";
                                    $run = pg_query($conn, $sql);
                            
if(pg_num_rows($run)>0){
                                    while ($result4 = pg_fetch_assoc($run)) {
                                        $id = $result4['id'];
                                        $policy = $result4['policy'];
                                    }
                                    ?>
                                    <p align="justify">
                                        <?php echo $policy; ?>
                                    </p>
<?php } else { ?> 
        <p align="justify">
                                    <?php echo "No Active Privacy Policy";?>
                                </p>
                            <?php }?>
                                </div>
                            </div>
                        </div>
                   
                    </div>
                </div>

            </div>
          
        </div>

        <div class="footer">
  <a href="index.php"class=" mt-5 mb-5 text-success">
<span >
   <i class="fa-solid fa-arrow-left ml-2" style="color:#35DD14;"></i>
Go Back 
</span>
                 </a>
     </div>
        <?php include("../include/scripts.php") ?>


        <script src="vendor/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
        <?php
        if (isset($_SESSION["message"])) {
            # code...
        ?>
            <script>
                $.toast({
                    heading: 'Looks Good!',
                    text: '<?php echo $_SESSION["message"] ?>',
                    position: 'top-right',
                    loaderBg: '#878787',
                    hideAfter: 3500
                });
            </script>
        <?php
            unset($_SESSION["message"]);
        }

        ?>
        <?php
        if (isset($_SESSION["message_error"])) {
            # code...
        ?>
            <script>
                $.toast({
                    heading: 'Opps! Failed',
                    text: '<?php echo $_SESSION["message_error"] ?>',
                    position: 'top-right',
                    loaderBg: '#fec107',
                    icon: 'error',
                    hideAfter: 3500
                });
            </script>
        <?php
            unset($_SESSION["message_error"]);
        }
        ?>
</body>


</html>