<?php 

include'config/db_connect.php';


$title=$email=$ingredients='';
$errors=array('email'=>'', 'title'=>'', 'ingredients'=>'');

// if(isset($_GET['submit'])){
	
// 	echo $_GET['email'];
// 	echo $_GET['title'];
// 	echo $_GET['ingredients'];
// }

if(isset($_POST['submit'])){
	
	// echo htmlspecialchars($_POST['email']);
	// echo htmlspecialchars($_POST['title']);
	// echo htmlspecialchars($_POST['ingredients']);

	//check email
	if (empty($_POST['email'])) {
		//echo "an email is required <br/>";
		$errors['email']="an email is required <br/>";
		}
		else{
			//echo htmlspecialchars($_POST['email']).'<br/>';
			$email=$_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				//echo "email must be a valid email address <br/>";
				$errors['email']="email must be a valid email address";
			}
		}

	//check title	
	if (empty($_POST['title'])) {
		//echo "a title is required <br/>";
		$errors['title']="a title is required";
		}
		else{
			//echo htmlspecialchars($_POST['title']).'<br/>';

			$title=$_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				//echo "title must be letters and spaces only<br/>";
				$errors['title']="title must be letters and spaces only";
			}

		}

	//check ingredients	
	if (empty($_POST['ingredients'])) {
		//echo "at least one ingredients is required <br/>";
		$errors['ingredients']="at least one ingredients is required";
		}
		else{
			//echo htmlspecialchars($_POST['ingredients']).'<br/>';

			$ingredients=$_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s+[a-zA-Z\s]+)+$/', $ingredients)){
				//echo "ingredients must be a comma separated list<br/>";
				$errors['ingredients']="ingredients must be a comma separated list";

			}
		}	

		if(array_filter($errors)){
			echo "errors in the form";
		}
		else{

			//escaping any kind of harmfull code available into variable
			$email=mysqli_real_escape_string($conn, $_POST['email']);
			$title=mysqli_real_escape_string($conn, $_POST['title']);
			$ingredients=mysqli_real_escape_string($conn, $_POST['ingredients']); 


			//create sql
			$sql="INSERT INTO pizzas(title,ingredients,email) VALUES('$title', '$ingredients', '$email')";

			//	save to database and check
			if(mysqli_query($conn, $sql)){
				//success
			header('location: index.php');
			}else{
				//error
				echo 'query error: '. mysqli_error($conn);
			}


			// //echo "form is valid";
			// header('location: index.php');
		}


} // end of post check


 ?>


<!DOCTYPE html>
<html>

<?php include('templets/header.php'); ?>

<section class="container grey-text">
	<h4 class="center">add a pizza</h4>
	
	<form class="white" action="<?php echo($_SERVER['PHP_SELF']) ?>" method="POST">
		
		<!--<form class="white" action="add.php" method="POST">-->
		<label for="email">your email:</label>
		<input type="email" name="email" value="<?php echo htmlspecialchars($email) ?>">
		<div class="red-text"><?php echo $errors['email']; ?></div>

		<label for="title">pizza title:</label>
		<input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
		<div class="red-text"><?php echo $errors['title']; ?></div>

		<label for="ingredients">ingredients(comma separated):</label>
		<input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
		<div class="red-text"><?php echo $errors['ingredients']; ?></div>

		<div class="center">
		<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
		</div>

	</form>
</section>

<?php include('templets/footer.php'); ?>


</html>