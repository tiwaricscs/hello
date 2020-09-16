<?php 

session_start();
if (isset($_POST['signup-submit'])) {
	
	require 'db_connect.php';


	$fname= $_POST['fname'];
	$lname=$_POST['lname'];
	$mobile=$_POST['mobile'];
	$dob=$_POST['dob'];
	$age=$_POST['age'];
	$edu=$_POST['edu'];
	$gender=$_POST['gender'];
	$address= $_POST['address'];

	$username=$_POST['uid'];
	$email=$_POST['mail'];
	$password       = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd_repeat'];
	$captcha        = $_POST['captcha'];



//img file handling
	
//img file handling end





	if (empty($username)||empty($email)||empty($password)||empty($passwordRepeat)||empty($fname)||empty($lname)||
	empty($mobile)||empty($dob)||empty($age)||empty($address)){
	 	header("location: ../signup.php?error=emptyfields&uid=".$username."$mail=".$email);
	 	exit();
	 }
	 
	 elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)&& !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    	header("location: ../signup.php?error=invalidmail&uid");
    	exit();
    }   elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 	header("location: ../signup.php?error=invalidmail&uid=".$username);
	 	exit();
	 }
	
	 elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
	 	header("location: ../signup.php?error=invaliduid&mail=".$email);
	 	exit();
	 }
	
	elseif ($password!==$passwordRepeat) {
	 	header("location: ../signup.php?error=passwordCheck&uid=".$username."$mail=".$email);
	 	exit();
	 }

	
	 elseif (!preg_match("/^[a-zA-Z]*$/", $fname)) {
	 	header("location: ../signup.php?error=invalidfname");
	 	exit();
	 }

	 
	 elseif (!preg_match("/^[a-zA-Z]*$/", $lname)) {
	 	header("location: ../signup.php?error=invalidlname");
	 	exit();
	 }

	 
	 elseif (!isset($dob)) {
	 	header("location: ../signup.php?error=invaliddob");
	 	exit();
	 }

	 
	 elseif (!preg_match("/^[0-9]*$/", $mobile)) {
	 	header("location: ../signup.php?error=invalidmobile");
	 	exit();
	 }

	
	 elseif (!preg_match("/^[0-9]*$/", $age)) {
	 	header("location: ../signup.php?error=invalidage");
	 	exit();
	 }
	
	 elseif (empty($edu)){
	 	header("location: ../signup.php?error=invalidedu");
	 	exit();
	 }
	 
	 elseif (empty($gender)) {
	 	header("location: ../signup.php?error=invalidgender");
	 	exit();
	 }
	
	 elseif (!isset($address)) {
	 	header("location: ../signup.php?error=invalidaddress");
	 	exit();
	 }  
	
	 elseif ($_POST['captcha'] !=  $_SESSION['captcha']) {
        header("location: ../signup.php?error=invlidcaptcha");
         exit();
      }
            	
         
	//  elseif (!isset($photo)) {
	//  	header("location: ../signup.php?error=imagerequire");
	//  	exit();
	// }

       elseif (empty($_POST['term'])) {
        header("location: ../signup.php?error=invlidterm");
         exit();
      }
	
	else{
        //create sql statement
		$sql="SELECT username FROM users WHERE username=?";
		//create a prepared statment
		$stmt=mysqli_stmt_init($conn);
		
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../signup.php?error=sqlerror");
				exit();
		}
		
		else{
			
			mysqli_stmt_bind_param($stmt, "s", $username);

			//execute the information got from the user into database
			mysqli_stmt_execute($stmt);
			//store the result into the variable $stmt
			mysqli_stmt_store_result($stmt);
			//checking how many results in $stmt
			$resultCheck= mysqli_stmt_num_rows($stmt);//if we have two rows with same data then this fun return 2, the variable $result have the number,of rows match 
			if ($resultCheck>0) {
				header("location: ../signup.php?error=usertaken");
		exit();
			}
			
			//signup the user into the website
			else{

				$hashedpwd=password_hash($password, PASSWORD_DEFAULT);
				$sql="INSERT INTO users (fname, lname, username, email, mobile, dob, age, edu, gender, address, password) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

					$stmt=mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("location: ../signup.php?error=sqlerror");
				exit();
		}else{

			$hashedpwd=password_hash($password, PASSWORD_DEFAULT);



			//these three function allwayas run when ever you want to inser data into the data base
			mysqli_stmt_bind_param($stmt, "ssssiiissss", $fname, $lname, $username, $email, $mobile, $dob, $age, $edu, $gender, $address, $hashedpwd);
            mysqli_stmt_execute($stmt);
			//mysqli_stmt_store_result($stmt); this mthod fetch data from data base

			header("location: ../index.php?signup=success");
			exit();


		}
		


			// 	if(mysqli_query($conn, $sql)){
			// 	//success
			// header('location: ../index.php');
			// }else{
			// 	//error
			// 	echo 'query error: '. mysqli_error($conn);
			// }


			// 	$sql="INSERT INTO users (fname,lname,username,email,mobile,dob,age,edu,gender,address,password) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

			// 	// Create a prepared statement
			// 	$stmt=mysqli_stmt_init($conn);
				
			// 	if (!mysqli_stmt_prepare($stmt, $sql)) {
			// header("location: ../signup.php?error=sqlerror");
			// 	exit();
			// 	}
				
			// 	else{

			// 		$hashedpwd=password_hash($password, PASSWORD_DEFAULT);

			// 		// Bind parameters
			// 		mysqli_stmt_bind_param($stmt, "sssiiissss", $fname, $username, $email, $mobile, $dob, $age, $edu, $gender, $address, $hashedpwd);
			// 		mysqli_stmt_execute($stmt);
			// 		header("location: ../signup.php?error=success");
			// 	exit();
			// 	}

			}

		}

	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);


}
else{
	header("location: ../signup.php");
				exit();
} 