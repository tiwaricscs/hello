<?php 

if (isset($_POST['login_submit'])) {

	require 'db_connect.php';

	$username=$_POST['userid'];
	$hashedpwd=$_POST['password'];
     
	
     if (empty($username)||empty($hashedpwd)) {
     	header("location: ../signin.php?error=emptyfields");
				exit();
     }

     else{
     	$sql="SELECT * FROM users WHERE username=? OR email=?;";
          
          $stmt=mysqli_stmt_init($conn);
     	
          if (!mysqli_stmt_prepare($stmt, $sql)) {
     		header("location: ../signin.php?error=sqlerror");
				exit();
     	}
     	else{
     		
     		 mysqli_stmt_bind_param($stmt, "ss", $username, $username);
     		 mysqli_stmt_execute($stmt);
     		 $result=mysqli_stmt_get_result($stmt);

     		 if ($row=mysqli_fetch_assoc($result)) {
     		   $pwdCheck=password_verify($hashedpwd, $row['password']);
     		   
     		   if ($pwdCheck==false) {
     		   	header("location: ../signin.php?error=wrongPassword");
				exit();
     		   }
     		   
     		   elseif ($pwdCheck==true) {
     		   	session_start();
     		   	$_SESSION['user']= $row['username'];
     		   	$_SESSION['fname']= $row['fname'];
                    $_SESSION['lname']= $row['lname'];

     		   	header("location: ../index.php?login=succes");
				exit();

     		   }
     		   else{
     		   	 	header("location: ../signin.php?error=wrongPassword");
				    exit();
     		   }
     		   } 
     		   else{
     		   	header("location: ../signin.php?error=noUser");
				exit();
     		   } 

     	}

     }

}

else{
	header("location: ../index.php");
				exit();
}