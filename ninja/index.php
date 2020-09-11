<?php 

// //connect to database
// $conn=mysqli_connect('localhost', 'rahul', '123456789', 'ninja_pizza');

// //check connection
// if(!$conn){
// 	echo "connection error: " . mysqli_connect_error();
// }


include 'config/db_connect.php';

//write query for all pizzas
$sql='SELECT title, ingredients, email, id FROM pizzas ORDER BY created_at';


//make query and get result
$result=mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$pizzas=mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

//print_r($pizzas);

//converting a string into an array
//print_r(explode(',', $pizzas[0]['ingredients']));

 ?>


<!DOCTYPE html>

<html>

<?php include('templets/header.php'); ?>

<h4 class="center grey-text">pizzas!</h4>

<div class="container">
	
	<div class="row">
		
		<?php foreach($pizzas as $pizza){ ?>
		

			<div class="col s6 md3">
				 
				<div class="card z-depth-0">
					<img src="img/piz.jpg" class="pizza">
					<div class="card-content center">
						
						<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
						
						<ul>
							<?php foreach (explode(',', $pizza['ingredients']) as $ing): ?>
								<li><?php echo htmlspecialchars($ing); ?></li>
							<?php endforeach; ?>
						</ul>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?id=<?php echo($pizza['id']) ?>">more info</a>
						</div>

					</div>
				</div>
			</div>
		<?php } ?>

<!--the use of ':' and 'endif' insted of opening and closing {} this idea can be use for loops as well-->
		<!-- <?php if (count($pizzas)<=3):?>
			<p>there are less than 3 pizzas</p>
			<?php else: ?>
				<p>there are more than 3 pizzas</p>
		<?php endif; ?> -->
	</div>
</div>

<?php include('templets/footer.php'); ?> 
<html/>