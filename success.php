  <?php 
  include'set_session1.php';
?><?php
session_start();

if(isset($_GET['transaction_id'])) {
    $date=date('d-m-Y');
    
    $amount = $_GET["amount"];
$user_id = $_GET["user_id"];
$type = $_GET["type"];
$share_id = $_GET["share_id"];



    header('location:../admin/signup.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"></script>
<style>
.btn-custom {
    background-color: #3CC922; /* Green */
}
.btn-custom:focus , .btn-custom:hover , .btn-custom:active , .btn-custom:visited {
    background-color: #3CC922; /* Green */
}
.custom-heading {
    color:#FD684A;
}
.custom-bkg {
    background-color:#FD684A;
}
/*onload*/
</style>
</head>
  <body class="container custom-bkg" 
  
  >
    <div class="row mt-5">
        <div class="col-12 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" style="width:100px;height:100px;margin:50px;" viewBox="0 0 512 512"><path fill="#fff" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z"/></svg>
            <h1 class="text-white">Team Buyed Successfully</h1>
            <h5 class="text-white">Transaction ID : <?php echo $_GET['transaction_id'];?></h5>
            <Button class="btn btn-custom"
            onclick="javascript:window.ReactNativeWebView.postMessage('record_updated')"
            >Go Back</Button>
           
        
        </div>
    </div>
  

</body>
 <script>
              const sendDataToReactNativeApp = async () => {
                window.ReactNativeWebView.postMessage('Data from WebView / Website');
              };
              window.addEventListener("message", message => {
                alert(message.data) 
              });
            </script>
</html>