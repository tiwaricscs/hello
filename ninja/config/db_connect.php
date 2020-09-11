<?php 

//connect to database
$conn=mysqli_connect('localhost', 'rahul', '123456789', 'ninja_pizza');

//check connection
if(!$conn){
	echo "connection error: " . mysqli_connect_error();
}

 ?>