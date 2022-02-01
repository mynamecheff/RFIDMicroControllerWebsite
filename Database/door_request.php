<!--Created by Albert-->
<?php
$server="localhost";
$username="root";
$password="";
$dbname="nodemcu_rfidir522_mysql";
$con=mysqli_connect($server,$username,$password,$dbname) or die("unable to connect");
//$rank=$_GET["id2"];
//$rank = "1";
$sql="SELECT * from tabe_door";
$result=mysqli_query($con,$sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {    
      echo  $row["door"];
}

}
?>