<?php
 session_start();
 // if (!$_SESSION['role']) {
 // 	header("location:index.php");
 // }
$conn=mysqli_connect("localhost","root","","form");

 $i=1;
?>
 <?php
  if (isset($_POST['delete'])) {
    $id=$_POST['id'];
    $sql="DELETE FROM `desc` WHERE `id`='$id'";
    $qry=mysqli_query($conn,$sql);
    if ($qry) {
        echo '<script>  alert("do you really want to delete");</script>';
    }
  }
 ?>

 <?php
  if (isset($_POST['apply'])) {
     $min=$_POST['min_age'];
     $max=$_POST['max_age'];
   
   $sql="SELECT `age` FROM `desc` WHERE `age` BETWEEN $min AND $max ";
   $qry=mysqli_query($conn,$sql);
   if ($qry) {
     $apply=mysqli_fetch_array($qry);
   }
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
   <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function(){
         $("#inp").on("keyup",function(){
            var a=$(this).val().toLowerCase();
            $("#tab tr").filter(function(){
               $(this).toggle($(this).text().toLowerCase().indexOf(a)>-1);
            });
         });
      });
   </script>
        <style>
          *{
      margin: 0px;
      padding: 0px;
    }
  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: sticky;
  top: 0;
}

li {
  float: left;
  
  display: block;
  color: orange;
  text-align: center;
  padding: 14px ;
  font-size: 32px;
  text-decoration: none;
  margin-left: 50px;

}

ul li :hover {
  background-color: black;
}
/*tr:nth-child(even) {
  background-color: lightgrey;
}*/
 table{
  width: 100%;
 }
</style>
</head>
<body>
    <ul>
      <li><b><u><em>BALLISTIC LEARNING PVT LTD</em></u></b></li>
   
     </ul>
     <br><br>
	<h2 align="center" style="font-size: 42px;"><b><u>ADMIN - PANNEL</u></b></h2>

  <form method="post" action="filter_age.php">
  Minimum age <input type="number" name="min_age"><br><br>
  Maximum age <input type="number" name=" max_age"><br><br>
    <input type="submit" name="apply" value="apply"><br><br>
 </form>
   <input type="text" name="" id="inp" placeholder="search" style="font-size: 24px;"><b>Search</b>

   <a href="welcome.php"><button style="float: right;font-size: 24px;font-weight: 10px;padding: 10px;">
    BACK</button></a><br><br><br>

	<a href="logout.php"><button style="float: right;font-size: 24px;font-weight: 10px;padding: 10px;">
    Logout</button></a><br><br><br>
    <BR>
   <table border="1">
      <thead>
   	<tr>
      <th>S.no</th>
   	 
   		<th>firstname</th>
   		<th>lastname</th>
   		<th>email</th>
   		<th>mobile</th>
   		<th>experience</th>
   		<th>age</th>
   		<th>dob</th>
   		<th>education</th>
   		<th>gender</th>
   		<th>address</th>
   		<th>image</th>
   		 
   		<th>delete</th>
         <th>edit</th>
   	</tr>
   </thead>
   <tbody id="tab">
   	<?php
   	$sql="SELECT * FROM `desc`";
   	$qry =mysqli_query($conn,$sql);

while ($result=mysqli_fetch_array($qry)) {?>
	<tr>
    <td>
      <?php
      echo $i++;
      ?>
    </td>
		 
		<td><?=$result['firstname']?></td>
		<td><?=$result['lastname']?></td>
		<td><?=$result['email']?></td>
		<td><?=$result['mobile']?></td>
		<td><?=$result['experience']?></td>
		<td><?=$result['age']?></td>

		<td><?=$result['dob']?></td>

		 <td>
      <?php
     $edu=json_decode($result['education'],true);
  
      foreach ($edu['from'] as $key => $value) {
        
         ?>
     
     from: <?=$edu['from'][$key]?><br>
     to: <?=$edu['to'][$key]?><br>
      course: <?=$edu['course'][$key]?><br>
      college: <?=$edu['college'][$key]?><br>

      <?php echo "<br>"; }?>
     </td>

		<td><?=$result['gender']?></td>
		<td><?=$result['address']?></td>
		
		<td>
      <?php
         if ($result['image']) {?>
             <img src="img/<?=$result['image']?>" height="100" width="120">
         <?php }
         else{
          echo " ";
         }  ?>
      
    </td>
		 
         
         <td>
             <form method="post">
               <input type="hidden" name="id" value="<?=$result['id']?>">
               <input type="submit" name="delete" value="Delete">
             </form>
           
         </td>

         <td>
      
            <form method="get" action="admin_control.php">
            <input type="hidden" name="id" value="<?=$result['id']?>">
            <input type="submit" name="edit" value="Edit">
         </form>
         </td>
	</tr>
<?php }
   	?>
   </tbody>
   </table>
</body>
</html>