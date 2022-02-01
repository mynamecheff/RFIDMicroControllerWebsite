<!--
this is the page where the user (admin)
can register a new key into the system
by scanning the key and fill the needed info.
Front-end Ahmed, back-end Albert
 -->
<?php
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
		<script src="jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				 $("#getUID").load("UIDContainer.php");
				setInterval(function() {
					$("#getUID").load("UIDContainer.php");
				}, 500);
			});
		</script>

		<style>

		textarea {
			resize: none;
		}


		label {
			font-size: 1.5em;
			text-align: right;
		}
		form {
			display: flex;
			flex-direction: column;
			gap: 20px;
		}
		form > * {
			flex: 1;
		}
		select,textarea,input {
			height: 2em;
			color: gray;
		}
		.control-group {
			display: flex;
			gap: 20px;
		}
		.control-group > * {
			flex: 1;
		}
		.form-actions {
			display: flex;
		  justify-content: center;
		  align-items: center;
		}

		</style>

		<title>Registration : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
	</head>

	<body>

		<!-- add the header at the start of the page -->
		<?php include "header.php" ?>

		<div class="container">
			<br>
			<div class="center" style="margin: 0 auto; width:400px;">
				<div class="row">
					<h3 align="center">Registration Form</h3>
				</div>
				<br>
				<form class="form-horizontal" action="insertDB.php" method="post" >
					<div class="control-group">
						<label class="control-label">ID</label>
						<div class="controls">
							<textarea name="id" id="getUID" placeholder=" Please Tag your Card" rows="1" cols="21" required></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Name</label>
						<div class="controls">
							<input id="div_refresh" name="name" type="text"  placeholder="" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Gender</label>
						<div class="controls">
							<select name="gender">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Email Address</label>
						<div class="controls">
							<input name="email" type="text" placeholder="" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Mobile Number</label>
						<div class="controls">
							<input name="mobile" type="text"  placeholder="" required>
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-success">Save</button>
          </div>
				</form>

			</div>
		</div> <!-- /container -->

		<!-- add the footer at the end of the page -->
		<?php include "footer.php" ?>
	</body>
</html>
