<?php
session_start();
require_once("php/encryption.php");
require_once("php/pbk.php");

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
    <title>Register Account</title>
    <!-- Bootstrap core CSS -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="col-sm-12 text-center" style="word-break:break-all;">
<?php
if(isset($_GET['secret']) && isset($_GET['user']) && isset($_GET['pass'])){
	if($_GET['secret'] == "lemueloodle2016"){
		
		//Secret Token
		$token = get_token(50);

		//User Info
		$user = $_GET['user'];
		$pass = $_GET['pass'];

		//Create Salt
		$saltx = encrypt_token($token);
		
		//Create New Account + Hash Pass + Salt
		$create = create_hash($pass);
		
		$salted_password = $create.$saltx;
		
		echo "<h2>*Copy this to your database*</h2><br><br>"; 

		//Username
		echo "<h2><i>Username:</i></h2><h2>".$user."</h2><br><br>";

		//Password
		echo "<h2><i>Password:</i></h2><h2>".$salted_password."</h2>";
	}
}

?>
</div>
</div>  
</body>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../../../js/jquery.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
</html>