<?php
session_start();

if (!$_SESSION['email']) {
	header("location:index.php");
}

 $conn=mysqli_connect("localhost","root","","form");

 if (isset($_POST['submit'])) {
 	  extract($_POST);

 	  $sql="INSERT INTO `email_table` (`sender_email`,`receiver_email`,`subject`,`message`)VALUES('$_SESSION[email]','$to','$sub','$message')";
 	  $qry=mysqli_query($conn,$sql);
 	  if ($qry) {
 	  	echo '<script>alert("mail sent");</script>';
 	  }

 }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#block{
			border: 2px solid #000;
			width: 33%; 
		}
	</style>
</head>
<body>
	<a href="welcome.php"><button>Back</button></a>
	<br><br>
	<div id="block">
		<h2 align="center"><u>Email</u></h2>
		<a href="inbox.php"><button style="margin-top: 10px;position: absolute; margin-left: 20px;border: 1px solid #000;">inbox</button></a>
		<a href="sent.php"><button style="margin-top: 50px;position: absolute; margin-left: 20px;border: 1px solid #000;">sent</button></a>
   <form method="post">
   	<table align="center">
   		<tr>
   		<td>
          <select name="to" required="">
             <option value=" ">Select Email</option>
             <?php
 
              
             $sql="SELECT `email` FROM `desc` WHERE NOT id =$_SESSION[id]";
             $qry=mysqli_query($conn,$sql);
              while ($data=mysqli_fetch_array($qry)) {
            echo "<option value='$data[email]'>$data[email]</option>";
              }
             ?>
          </select>    
         </td> 
   		</tr>
   		<tr>
   			<td><input type="text" placeholder="Subject" name="sub" style="width: 150%;"></td>
   		</tr>
   		<tr>
   			<td><textarea placeholder="Compose email:" rows="5" cols="22" name="message" style="width: 150%;"></textarea></td>
   		</tr>
   		<tr>
   			 
   			<td><input type="submit" name="submit" value="sent"></td>
   		</tr>
   	</table>
   </form>
</div>
</body>
</html>