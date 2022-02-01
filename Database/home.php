<!--
this is the home page after a user is loggedIn
not much to it, just a Welcome note and an image
backend by Albert front-end by Ahmed
 -->
<?php
//Session is a unique new token for the user, which is a global variable, and is used to check whether he has logged in correctly or not.
	session_start();
	if($_SESSION['loggedIn']){

	}else{
		header('Location: /NodeMCU_RC522_Mysql');
	}


	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<style>


		img {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		</style>

		<title>Home : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
	</head>

	<body>

		<!-- add the header at the start of the page -->
		<?php include "header.php" ?>

		<h3>Welcome to Keyvio's website!</h3>

		<img src="home ok ok.jpg" alt="" style="width:55%;">

		<!-- add the footer at the end of the page -->
		<?php include "footer.php" ?>


	</body>
</html>
