<?php
//Created by Albert
	//Writing some php code in a file, so the browser can update the read tag page
	$UIDresult=$_POST["UIDresult"];
	$Write="<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);


	//Flag used to check what to return to ESP.
	$IDExists = false;

	//authenticate user with database
   	include 'database.php';
   	$pdo = Database::connect();
   	$sql = 'SELECT * FROM table_nodemcu_rfidirc522_mysql ORDER BY name ASC';
   	foreach ($pdo->query($sql) as $row) {
   		if(strcmp($row['id'],$UIDresult)==0){	//IDs are equal
   			$IDExists = true;
   		}
   	}

   	//Response and insert into log
   	if($IDExists){

		$sql = "INSERT INTO rfid_log (hex,date_time) values(?,?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($UIDresult,date("d/m/Y")." ".date("h:i:sa")));

   		//Response
   		echo 'Accepted';
   	}else{
   		//response
   		echo 'Denied';
   	}

   	Database::disconnect();
?>