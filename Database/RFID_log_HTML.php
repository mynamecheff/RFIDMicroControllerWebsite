<!--
this page shows how used the key at what time.
Created by Nicklas
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
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script src="jquery.min.js"></script>

        <style>

        td.lf {
    			padding-left: 15px;
    			padding-top: 12px;
    			padding-bottom: 12px;
    		}

				.white {
					color: #FFFFFF;
				}
        </style>

        <title>RFID log</title>
    </head>


    <body>

				<!-- add the header at the start of the page -->
        <?php include "header.php"?>

          <form>
            <table  width="452" border="1" bordercolor="#10a0c5" align="center"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="padding: 2px">
              <tr>
                <td  height="40" align="center"  bgcolor="#10a0c5"><font  color="#FFFFFF">
                  <b>Login Data</b>
                  </font>
                </td>
              </tr>
              <tr>
                <td  bgcolor="#f9f9f9">
                  <table width="452"  border="0" align="center" cellpadding="5"  cellspacing="0">
                    <tr bgcolor="#10a0c5" class="white">
                      <td width="113" align="left" class="lf">ID</td>
                      <td style="font-weight:bold">:</td>
                      <td align="left">date & time</td>
                    </tr>

            <?php
                include 'database.php';
                $pdo = Database::connect();
                $sql = 'SELECT * FROM rfid_log ORDER BY id DESC';
                foreach ($pdo->query($sql) as $row) {
                        echo "<tr>
                          <td width='113' align='left' class='lf'>".$row['hex']."</td>
                          <td style='font-weight:bold'>:</td>
                          <td align='left'>".$row['date_time']."</td>
                        </tr>";
                }
            ?>
          </table>
          </td>
          </tr>
          </table>
          </form>



				<!-- add the footer at the end of the page -->
        <?php include "footer.php"?>
    </body>
</html>
