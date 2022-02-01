<?php
    //we have gotten a bit of help from the internet to make webserver created by Albert
  //php code to connect to database, this is used in multiple files so we made it into one to not make this redundant
$conn = "";
   
try {
    $servername = "localhost:3306";
    $dbname = "loginPage";
    $username = "root";
    $password = "";
   
    $conn = new PDO(
        "mysql:host=$servername; dbname=loginPage",
        $username, $password
    );
      
   $conn->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
  
?>