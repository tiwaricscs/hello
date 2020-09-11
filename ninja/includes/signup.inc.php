<?php 
if (isset($_POST['signup-submit'])) {
	require 'dbh.inc.php';


	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mobile=$_POST['mobile'];
	$dob=$_POST['dob'];
	$age=$_POST['age'];
	$edu=$_POST['edu'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$photo=$_POST['photo'];

	$username=$_POST['uid'];
	$email=$_POST['mail'];
	$password=$_POST['pwd'];
	$passwordRepeat=$_POST['pwd_repeat'];

	setcookie('username', $_POST['uid'], time()+43200);
	setcookie('mail', $_POST['mail'], time()+43200);

	if (empty($username)||empty($email)||empty($password)||empty($passwordRepeat)||empty($fname)||empty($lname)||
	empty($mobile)||empty($dob)||empty($age)||empty($edu)||empty($gender)||empty($address)||empty($photo) ){
		header("location: ../signup.php?error=emptyfields&uid=".$username."$mail=".$email);
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)&& !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("location: ../signup.php?error=invalidmail&uid");
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
	elseif (!preg_match("/^[a-zA-Z]*$/", $edu)) {
		header("location: ../signup.php?error=invalidedu");
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z]*$/", $gender)) {
		header("location: ../signup.php?error=invalidgender");
		exit();
	}
	elseif (!isset($address)) {
		header("location: ../signup.php?error=invalidaddress");
		exit();
	}
	elseif (!isset($photo)) {
		header("location: ../signup.php?error=imagerequire");
		exit();
	}

	else{

		$sql="SELECT uidUsers FROM users WHERE uidUsers=?";
		$stmt=mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../signup.php?error=sqlerror");
				exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck= mysqli_stmt_num_rows($stmt);
			if ($resultCheck>0) {
				header("location: ../signup.php?error=usertaken");
		exit();
			}
			else{
				$sql="INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";
				$stmt=mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../signup.php?error=sqlerror");
				exit();
				}
				else{

					$hashedpwd=password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpwd);
					mysqli_stmt_execute($stmt);
					header("location: ../signup.php?signup=success");
				exit();
				}

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