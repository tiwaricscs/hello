 <?php
  session_start();

 $conn=mysqli_connect("localhost","root","","form");
 if (isset($_GET['edit'])) {
 	 $id=$_GET['id'];
 	 $sql="SELECT * FROM `desc` WHERE `id`='$id'";
 	 $qry=mysqli_query($conn,$sql);
 	  
 	 	$data=mysqli_fetch_array($qry);
 	 $_SESSION['current_user_to_edit'] = $data['firstname'];
   	//print_r($data);die();
 	  
 }
 ?>
 <?php
 if (isset($_POST['update'])) {
    // print_r($_POST) ; die("stup here");
     extract($_POST);
          $education=array("from"=>$_POST['edufrom'],
                          "to"=>$_POST['edu_to'],
                          "course"=>$_POST['edu_course'],
                          "college"=>$_POST['edu_college']
          
                
                     );

          $edu=json_encode($education);

     $file=$_FILES['file'];
     $fname=$file['name'];
     $tname=$file['tmp_name'];
     $fn=date('d_m_y_h_i_s').$fname;
     if ($file['type']=="image/jpg"||$file['type']=="image/png"||$file['type']=="image/jpeg") {
     	if ($file['size']<(1024*1024)) {
     		move_uploaded_file("$tname","img/$fn");
     	
     
   $sql="UPDATE `desc` SET  `firstname`= '$n1',`lastname`= '$n2',`email`='$n3',`mobile`='$n4',`experience`= '$exp',`age`= '$n5',`dob`= '$n6',`education`= '$edu',`gender`= '$n7',`address`='$n8',`image`='$fn' WHERE `id`='$id'";


   $qry=mysqli_query($conn,$sql);



   if ($qry) {
    	 header('location:admin.php');
    
   }
}
else{
	echo "file size limit exceeds";
}
}
else{
	$sql="UPDATE `desc` SET  `firstname`= '$n1',`lastname`= '$n2',`email`='$n3',`mobile`='$n4',`experience`= '$exp',`age`= '$n5',`dob`= '$n6',`education`= '$edu',`gender`= '$n7',`address`='$n8' WHERE `id`='$id'";


   $qry=mysqli_query($conn,$sql);

   if ($qry) {
    	 header('location:admin.php');
    
   }
}
}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title></title>
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
</style>
</head>
<body>
    <ul>
      <li><b><u><em>BALLISTIC LEARNING PVT LTD</em></u></b></li>
   
     </ul>
     <br><br>
	<h2><u>EDIT-  <?php echo $_SESSION['current_user_to_edit']; ?></u></h2><br>
    <a href="admin.php"><button style="float: right;font-size: 24px;font-weight: 10px;padding: 10px;">
    BACK</button></a><br><br><br>
     <form method="post" enctype="multipart/form-data">
          
     	<table>
     		<tr>
     			<td><b>Firstname:</b></td>
     		<td><input type="text" name="n1" placeholder="Enter firstname" value="<?=$data['firstname']?>">
                     </td>
     		</tr>
     		<tr>
     			<td><b>Lastname:</b></td>
     			<td><input type="text" name="n2" placeholder="Enter lastname" value="<?=$data['lastname']?>"></td>
     		</tr>
     		<tr>
     			<td><b>Email:</b></td>
     			<td><input type="email" name="n3" placeholder="Enter email address" value="<?=$data['email']?>">
                         </td>
     		</tr>
     			<tr>
     			  <td><b>Mobile:</b></td>
     			<td><input type="number" name="n4" placeholder="Enter Mobile number" value="<?=$data['mobile']?>">
                          </td>
     		</tr>
               <tr>
                    <td><b>Experience:</b></td>
                    <td>  
                         <select name="exp" >
                              <option value="fresher" <?php if($data['experience']=='fresher'){echo "selected";} ?>>fresher</option>
                              <option value="trainee"<?php if($data['experience']=='trainee'){echo "selected";}?> >trainee</option>
                              <option value="experienced"<?php if($data['experience']=='experienced'){echo "selected";}?>>experienced</option>
                         </select>
                    </td>
               </tr>
     			<tr>
     			<td><b>Age:</b></td>
     			<td><input type="number" min="18" max="58" name="n5" value="<?=$data['age']?>">
                     </td>
     		</tr>
     			<tr>
     			<td><b>D.O.B:</b></td>
     			<td><input type="date" name="n6" value="<?=$data['dob']?>">
                     </td>
     		</tr>
     		<tr>
     			<td><b>Education:</b></td>
     			  	
                <?php
           
             $edu=json_decode($data['education'],true);
              echo "<pre>";
               print_r($edu);
              foreach ($edu['from'] as $key => $value) { ?>
                
                 <td>
                  
              <small><b>from</b></small>
     				<input type="date" name="edufrom[]" value="<?=$edu['from'][$key]?>">
     				<small><b>to</b></small>
     				<input type="date" name="edu_to[]" value="<?=$edu['to'][$key]?>">
     				<small><b>course</b></small>
     				<input type="text" name="edu_course[]" placeholder="Enter college name" value="<?=$edu['course'][$key]?>">
     			    <small><b>college</b></small>
     				<input type="text" name="edu_college[]" placeholder="Enter course" value="<?=$edu['college'][$key]?>"> 
     				
     			 </td>
     			      	   
          <?php }
             ?>
               	
     		</tr>
     		<tr>
     			<td><b>Gender:</b></td>
     			<td><input type="radio" name="n7" value="male" <?php  if ($data['gender']=="male") {
     				echo "checked";	} ?>>male
     			<input type="radio" name="n7" value="female" <?php if ($data['gender']=="female") {
     				echo "checked";	}?>>female
     			<input type="radio" name="n7" value="other" <?php if ($data['gender']=="other") {
     			 echo "checked";
     			}?>>other
                   </td>
     		</tr>
     		<tr>
     		<td><b>Address:</b></td>
     	      <td><textarea rows="5" cols="40" name="n8" placeholder="Enter address"><?=$data['address']?></textarea></td>
     		</tr>
     		
     		<tr>
     			<td><b>Image</b></td>
     			<td><input type="file" name="file"></td>
     		</tr>
          
     		           
     		<tr>
     			<td><input type="hidden" name="id" value="<?=$data['id']?>"></td>
     			<td><input type="submit" name="update" value="Update"></td>

     		</tr>
     	</table>
     </form>