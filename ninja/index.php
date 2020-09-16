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


<?php 

     if (!isset($_SESSION['user'])) {

     echo "<div class='center card z-depth-0'><span> Want to learn a thing or two about the savory pie to impress all your friends at your next pizza party? Here are ten interesting facts about the history of pizza. A word of warning: You're going to want to order a slice before you get to the end of this article.</span>

<span>
Foods similar to the pizza—namely flatbreads and oven-baked bread with various toppings—have been prepared since the Neolithic age. You can find them in almost every region of the world.</span><br><span>
However, bakers in Naples prepared the first dish to be known as a 'pizza' in the 1600s. This street food was sold to the poor Neapolitans who spent much of their time outside their one-room homes. These Neapolitans would purchase slices of pizza and eat it as they walked, which led contemporary Italian authors to call their eating habits 'disgusting.'</span><br><span>
In 1889, King Umberto I and Queen Margherita first visited a newly unified Italy and came through Naples. Legend has it that they had grown bored of a constant diet of French haute cuisine, and the Queen asked for varieties of pizza to try. A baker named Raffaele Esposito of Da Pietro Pizzeria (now known as Pizzeria Brandi) invented a pie with red tomato sauce, white mozzarella, and green basil: the colors of the Italian flag. This heavenly mix of ingredients quickly won Queen Margherita's approval. Margherita pizza was thus born and remains a staple to this day.</span><br><span>
Though Queen Margherita gave her royal blessing to the pizza, pizza did not become well known outside of Naples until the late 1800s, when Italians began migrating to the Americas and carrying their tastes and recipes with them.</span><br><span>
In 1905, Gennaro Lombardi opened the first pizzeria in the United States, selling pizza at his street front shop in Manhattan, located in a booming Italian-American neighborhood. Lombardi's is still in operation today and, though it is no longer at its original location, the restaurant has the same oven as it did in 1905.</span><br><span>
By the 1930s, the pizza business boomed. Italian-Americans opened up pizzerias across Manhattan, New Jersey, and Boston. In 1943, Ike Sewell opened Uno's in Chicago, bringing forth Chicago-style pizza. However, despite its popularity, pizza was still primarily a poor working man's food.</span><br><span>
After World War II, U.S. soldiers returned home from Europe, wanting to taste the pizza they had so frequently eaten across seas. In 1945, Ira Nevin, a returning soldier, invented the Baker's Pride gas-fired pizza oven. This invention allowed retailers to inexpensively and easily bake pizza pies, without the fuss of charcoal or wood. Taverns and restaurants began selling more and more pizzas.</span><br><span>

The real proliferation of pizzas occurred with the advent of the pizza chain. Pizza Hut opened in 1958, Little Caesar's opened in 1959, Domino's opened in 1960, and Papa John's opened in 1989. Each of these businesses came into being with the idea that they would sell pizzas to the masses. In 2019 alone, Pizza Hut opened 1,000 new locations in China, though Domino's is the highest-earning chain.</span><br><span>
In 1957, Celentano's began marketing frozen pizzas. Soon, pizza became the most popular of all frozen meals.</span><br><span>
Today, the pizza business brings in an estimated $46 billion in revenue in the United States, with the top 50 pizza chains earning roughly $27 billion. Even more impressively, the entire industry is making about $145 billion worldwide.</span></div>";
      
                
            }


?>


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