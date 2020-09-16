<?php 

//connect to database
$servername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="ninja_pizza";

$conn=mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

//check connection
if(!$conn){
	echo "connection error: " . mysqli_connect_error();
}
// else{
//  	echo "success";
// }

 ?>