<?php 

 ?>

 <!DOCTYPE html>
 <html>
<?php include('templets/header.php'); ?>
 
 <form class="white" action="includes/login.inc.php" method="POST">
 	<input type="text" name="userid" placeholder="username/email">

 	<input type="password" name="password" placeholder="password">
    <button type="submit" name="login_submit" class="btn brand z-depth-0">login</button>

 </form>
 <?php include('templets/footer.php'); ?> 
 </html>