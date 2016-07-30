<?php
session_start();
require_once("encryption.php");
require_once("pbk.php");
require_once("connection.php");


if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['token'])){


	//Anti CSRF
	$usg = clean_input("{$_POST['user']}");
	$psg = clean_input("{$_POST['pass']}");
	$tkg = clean_input("{$_POST['token']}");


	//Check if token valid
	$s_token = dcrypt_token("{$tkg}");

	//Check if token is equal
	if($s_token == $_SESSION['signing-token']){

		//Get is user if valid
		try {
    		$pdo = new PDO('mysql:host='.$host.';dbname='.$db.'', $userx, $passx);
		  	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$fetchx = $pdo->prepare("SELECT * from admin_account where admin_user = :usg");
			$fetchx->execute(array(
			    ':usg'   => $usg
			  ));

			$ck_int = $fetchx->rowCount();

			if($ck_int!=0){
				$fetchx->setFetchMode(PDO::FETCH_ASSOC);

				//Fetch Hashed Pass
				$fetched_hashp = $fetchx->fetch();

				//Check if password is valid
				$p_encrpyt = $fetched_hashp['admin_pass'];

				$a = substr($p_encrpyt, 149);
				$b = stristr($p_encrpyt, $a, true);
				$val = validate_password($psg, $b);

				
				//If Valid
				if($val==1){
					$_SESSION['dashboard_token'] = get_token(50);
					echo "{";
					echo '"status" : "done",';
					echo '"next" : "http://localhost/php-bootstrap-login/dashboard/'.$_SESSION['dashboard_token'].'"';
					echo "}";
				}
				else{
					echo "{";
					echo '"status" : "invalid"';
					echo "}";
				}
			}
			else{
				echo "{";
				echo '"next" : "invalid"';
				echo "}";
			}

	}catch(PDOException $e) {
				  echo 'Error: ' . $e->getMessage();
			}	
	}
}
else{
	header("Location: http://localhost/php-bootstrap-login");
}
?>