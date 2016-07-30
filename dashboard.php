<?php
session_start();
include('php/connection.php');
include('php/encryption.php');

//Validate Token
if(isset($_GET['access_token']) && $_SESSION['dashboard_token'] == $_GET['access_token']){
?>
<!DOCTYPE html>
<html lang="en"><script id="tinyhippos-injected">if (window.top.ripple) { window.top.ripple("bootstrap").inject(window, document); }</script>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Sample Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="col-sm-12 text-center">
<h1>Successful Login!</h1>
<h3>Welcome to Dashboard</h3>
</div>  
</body>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</html>
<?php
}
else{
  header("Location: http://localhost/php-bootstrap-login");
}
?>