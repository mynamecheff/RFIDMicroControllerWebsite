
<!--
  Backend by Albert front-end by Ahmed
this page gives the user the ability to
lock and Unlock the door at any time.
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
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
    <style media="screen">
    .title {
      margin-top: 5%;
      margin-bottom: 2.5%;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    h1 {
      width: 50%;
    }
    </style>

    <title>
        this calls php button
    </title>
</head>

<body>


	<!-- add the header at the start of the page -->

  <?php include "header.php"?>

    <div class="title">
      <h1>
          Lock/Unlock your door with one single click
      </h1>
    </div>

    <?php
    //two buttons responsible for updating the database with a "<" or ">" this works with the arduino code to unlcok/lock the door :)))
        if(array_key_exists('button1', $_POST)) {
            button1();
        }
        else if(array_key_exists('button2', $_POST)) {
            button2();
        }
        function button1() {
            echo "Your door is locked";
            $server="localhost";
            $username="root";
            $password="";
            $dbname="nodemcu_rfidir522_mysql";
            $con=mysqli_connect($server,$username,$password,$dbname) or die("unable to connect");
            //$rank=$_GET["id2"];
            $rank = "1";
            $sql="UPDATE tabe_door  set door = 'locked'";
            $result=mysqli_query($con,$sql);

        }
        function button2() {
            echo "Your door is unlocked";
            $server="localhost";
            $username="root";
            $password="";
            $dbname="nodemcu_rfidir522_mysql";
            $con=mysqli_connect($server,$username,$password,$dbname) or die("unable to connect");
            //$rank=$_GET["id2"];
            $rank = "1";
            $sql="UPDATE tabe_door  set door = 'unlocked'";
            $result=mysqli_query($con,$sql);
        }
    ?>

    <form method="post">
        <input type="submit" name="button1"
                class="btn btn-success" value="Lock" />

        <input type="submit" name="button2"
                class="btn btn-danger" value="Unlock" />
    </form>


		<!-- add the footer at the end of the page -->

    <?php include "footer.php"?>
</body>

</html>
