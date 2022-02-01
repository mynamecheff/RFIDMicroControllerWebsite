<?php
//created by Albert
$server="localhost";
$username="root";//THE DEFAULT USERNAME OF THE DATABASE
$password="";
$dbname="nodemcu_rfidir522_mysql";
$con=mysqli_connect($server,$username,$password,$dbname) or die("unable to connect");
$rank=$_GET["id2"];
//$rank = "634D2216";
$sql="SELECT id from table_nodemcu_rfidirc522_mysql WHERE id = '$rank'";//WE ARE TRYING TO GET THE NAME OF THE STUDENT BY ENTERING THE RANK
$result=mysqli_query($con,$sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {    
      echo  $row["id"];
}

}
?>