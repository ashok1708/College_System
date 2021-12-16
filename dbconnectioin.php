<?php
$servername = "mysql:host=localhost;dbname=jnvu";  //"mysql:host=localhost;dbname="<dababase_name>";
$username = "root";
$password = "";
$database_pass="";


//$conn=mysqli_connect($servername,$username,$password,$database);
try{
    $pdoConn=new PDO($servername,$username,$password);

}
catch (PDOException $e){
    die('Query Failed : '.$e->getMessage());
}

?>
