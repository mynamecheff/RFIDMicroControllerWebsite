<!--
this page contains all key users info
where the admin can edit or delete any
key user info.
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
		<style>

		.overlay, .overlay2 {
		  position: fixed;
		  top: 0;
		  bottom: 0;
		  left: 0;
		  right: 0;
		  background: rgba(0, 0, 0, 0.7);
		  transition: opacity 500ms;
		  visibility: hidden;
		  opacity: 0;
		}
		.table {
			margin: auto;
			width: 90%;
		}
		.btn {
			border: gray solid 1px;
		}
		thead {
			color: #FFFFFF;
		}
		</style>

		<title>User Data : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
	</head>

	<body>

		<!-- add the header at the start of the page -->
		<?php include "header.php"?>
		<form  method="post">
		<div class="container">
            <div class="row">
                <h3>User Data Table</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
                      <th>Name</th>
                      <th>ID</th>
					  <th>Gender</th>
					  <th>Email</th>
                      <th>Mobile Number</th>
					  <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM table_nodemcu_rfidirc522_mysql ORDER BY name ASC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['id'] . '</td>';
                            echo '<td>'. $row['gender'] . '</td>';
							echo '<td>'. $row['email'] . '</td>';
							echo '<td>'. $row['mobile'] . '</td>';
							echo '<td><button class="btn btn-success" type="submit" name="id3" value="'.$row['id'].'">Edit</button>';
							echo ' ';
							echo '<button class="btn btn-danger" type="submit" name="id2" value="'.$row['id'].'/'.$row['name'].'">Delete</button>';
							echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
				</table>
			</div>
		</div> <!-- /container -->
		</form>
		<?php include "user data delete page.php" ?>
		<?php include "user data edit page.php" ?>



		<!-- add the footer at the end of the page -->
		<?php include "footer.php" ?>
	</body>
</html>
