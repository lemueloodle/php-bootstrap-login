<?php
session_start();
include('php/encryption.php');
$_SESSION['signing-token'] = get_token(50);
?>
<!DOCTYPE html>
<html lang="en"><script id="tinyhippos-injected">if (window.top.ripple) { window.top.ripple("bootstrap").inject(window, document); }</script>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Sign in</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="form-signin">
        <h2 class="form-signin-heading"></h2>
         <div id="sgn_u" class="form-group">
        <input type="text" class="form-control" id="sgn_user" placeholder="Username" required="" autofocus="">
        </div>
         <div id="sgn_p" class="form-group">
        <input type="password" class="form-control" id="sgn_pazz" placeholder="Password" required="">
        </div>
        <input class="btn btn-lg btn-primary btn-block sgn_btn" data-dist="<?php $nux = encrypt_token("{$_SESSION['signing-token']}"); echo $nux;?>" type="button" value="Sign in">
      </div>
    </div> <!-- /container -->
    <div class="modal fade" id="inv-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
             <b>Invalid Username or Password!</b>
          </div>
        </div>
      </div>
    </div>
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/signin.js"></script>
  </body>
</html>