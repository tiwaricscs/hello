<?php 

require "templets/header.php";

//$emptyfields= $invaliduid= $invalidmail=$passwordCheck=$usertaken='';

$errors=array('emptyfields'=>'', 'invaliduid'=>'', 'invalidmail'=>'', 'passwordCheck'=>'', 'usertaken'=>'', 'invalidfname'=>'', 'invalidlname'=>'', 'invaliddob'=>'', 'invalidmobile'=>'', 'invalidage'=>'', 'invalidedu'=>'', 'gender'=>'', 'invalidaddress'=>'', 'imagerequire'=>'');


if (isset($_GET['error'])) {
 				if ($_GET['error']=="emptyfields") {
 					$errors['emptyfields']="<p>fill in all fields</p>";
 				}
 				
 				elseif ($_GET['error']=="invaliduid") {
 					$errors['invaliduid']="<p>invalid username</p>";
 				}
 				elseif ($_GET['error']=="invalidmail") {
 					$errors['invalidmail']="<p>invalid email</p>";
 				}
 				elseif ($_GET['error']=="passwordCheck") {
 					$errors['passwordCheck']="<p>your password do not match</p>";
 				}
 				elseif ($_GET['error']=="usertaken") {
 				$errors['usertaken']="<p>username is already taken </p>";
 				}
 				elseif ($_GET['error']=="invalidfname") {
 					$errors['invalidfname']="<p>invalid first name</p>";
 				}
 				elseif ($_GET['error']=="invalidlname") {
 					$errors['invalidlname']="<p>invalid last name</p>";
 				}
 				elseif ($_GET['error']=="invaliddob") {
 					$errors['invaliddob']="<p>invalid dob</p>";
 				}
 				elseif ($_GET['error']=="invalidmobile") {
 					$errors['invalidmobile']="<p>invalid mobile</p>";
 				}
 				elseif ($_GET['error']=="invalidage") {
 					$errors['invalidage']="<p>invalid age</p>";
 				}
 				elseif ($_GET['error']=="invalidedu") {
 					$errors['invalidedu']="<p>invalid education</p>";
 				}
 				elseif ($_GET['error']=="gender") {
 					$errors['gender']="<p>invalid gender</p>";
 				}
 				elseif ($_GET['error']=="invalidaddress") {
 					$errors['invalidaddress']="<p>invalid address</p>";
 				}
 				elseif ($_GET['error']=="imagerequire") {
 					$errors['imagerequire']="<p>please select image</p>";
 				}
 			}

     elseif($_GET['signup']=="success") {
 			echo "<p>signup is successful</p>"; 			
 		}

 ?>


 <main>
 	<div>
 		<section>
 			<h3 class="center brand-text">signup</h3>
 			
 			<form action="includes/signup.inc.php" method="post" id="myForm" name = "myForm" onsubmit = "return validate()">
 				
 				<div class="red-text"><?php if(isset($errors['emptyfields'])){echo $errors['emptyfields']; }?></div>


 				<label for="first name">your first name:</label>
 				<input type="text" id="fname" name="fname" placeholder="firstname">
 				<div class="red-text"><?php echo $errors['invalidfname']; ?></div>


 				<label for="last name">your last name:</label>
 				<input type="text" id="lname"name="lname" placeholder="lasttname">
 				<div class="red-text"><?php echo $errors['invalidlname']; ?></div>



 				<label for="username">your user name:</label>
 				<input type="text" id="uid" name="uid" placeholder="username" value="<?php echo htmlspecialchars($_COOKIE['username']??''); ?>">
 				<div class="red-text"><?php if (isset($errors['invaliduid'])){echo $errors['invaliduid'];} elseif (isset($errors['usertaken'])){echo $errors['usertaken'];}?></div>
 				
 				<label for="email">your email:</label>
 				<input type="email" id="mail" name="mail" placeholder="e-mail" value="<?php echo htmlspecialchars($_COOKIE['mail']??''); ?>">
 				<div class="red-text"><?php echo $errors['invalidmail']; ?></div>
 				
 				<div>
 				<label for="mobile">your mobile no:</label>
 				 <input type="tel" pattern="^\d{10}$" placeholder="mobile number"  id="mobile" name="mobile" required >
 				<div class="red-text"><?php if(isset($errors['invalidmobile'])){echo $errors['invalidmobile']; }?></div>
				</div>


 				<div>
 				 <label for="dob">your dob:</label>
 				 <input type = "date" name="dob" id="dob">
 				 <div class="red-text"><?php echo $errors['invaliddob']; ?></div>
 				 </div>


 				 <div>
 				 <label for="age">your age:</label>
 				 <input type="number" id="age" name="age" min="0" max="100"placeholder="age">
 				  <div class="red-text"><?php echo $errors['invalidage']; ?></div>
 				</div><br>
 				 
 				 <div >
 				  <label for="edu">your education:</label>
 				  <select class="browser-default" name="edu" id="edu">
 				  	<option value="" disabled selected>Choose your education</option>
 					 <option value="high school">high school</option>
 					 <option value="10+2">10+2</option>
  					 <option value="graduate">graduate</option>
 					 <option value="post graduate">post graduate</option>
					</select>
					 <div class="red-text"><?php echo $errors['invalidedu']; ?></div>
				</div>
					<br>
					


						<div>

						 <p>
						 	<label>select your gender</label><br>
     					 <label>
      					  <input name="gender" type="radio" id="gender" />
      					  <span>Male</span>
      						</label>
   						 </p>

    					 <p>
     					 <label>
      					  <input name="gender" type="radio" id="gender" />
      					  <span>Female</span>
     					 </label>
   						 </p>
			

						 <p>
    					  <label>
     					   <input name="gender" type="radio"  id="gender"/>
      					 <span>Other</span>
    					  </label>
   						 </p>		
					
				<div class="red-text"><?php echo $errors['gender']; ?></div></div>





					<br>
					<div>
					<label for="address">your address:</label>
					<textarea id="address" name="address" class="materialize-textarea" rows="4" cols="50">
  						
  					</textarea>
  						<div class="red-text"><?php echo $errors['invalidaddress']; ?></div>
  				</div>





  					<br>
 				<label for="password">your password:</label>
 				<input type="password" name="pwd" placeholder="password" id="pwd">
 				<label for="password">repeat password:</label>
 				<input type="password" name="pwd_repeat" placeholder="repeat  password" id="pwd_repeat">
 				<div class="red-text"><?php echo $errors['passwordCheck']; ?></div>

 				
  					

 					<br>

  					<div>
  					<label for="photo">select your photo:</label>
  					<input type="file" name="photo" accept="image/*" id="photo"></div>
  					<div class="red-text"><?php echo $errors['imagerequire']; ?></div>
  					<br>
  					<p>
  						<label>
  							<input type="checkbox" name="term" id="term">
  							<span> I agree</span>
  						</label>
  					</p>
  					
  					<br>
  						 <br>
            <p>enter captcha</p>
            <p><img src="captcha.php" width="120" height="40" border="1" alt="CAPTCHA"></p>
            <p><input class="input_data" type="text"  name="captcha" id="captcha"><br>
            <br>

 				<button type="submit" name="signup-submit">signup</button>
 			</form>

 		



 		</section>
 	</div>
 



 <script type = "text/javascript">
  
      function validate() {

      

       if( document.getElementById("myForm").value == "" ) {
            alert( "Please provide your name!" );
            document.myForm.Name.focus() ;
            return false;
         }
         else if(document.getElementById("mail").value == "" ) {
            alert( "Please provide your Email!" );
            document.myForm.mail.focus() ;
            return false;
         }

           else if(document.getElementById("fname").value  == "" ) {
            alert( "Please provide your first name" );
            document.myForm.fname.focus() ;
            return false;
         }

           else if( document.getElementById("lname").value  == "" ) {
            alert( "Please provide your last name!" );
            document.myForm.lname.focus() ;
            return false;
         }

           else if(document.getElementById("uid").value  == "" ) {
            alert( "Please provide your username!" );
            document.myForm.uid.focus() ;
            return false;
         }

           else if(document.getElementById("mobile").value  == "" ) {
            alert( "Please provide your mobile!" );
            document.myForm.mobile.focus() ;
            return false;
         }

           else if(document.getElementById("dob").value == "" ) {
            alert( "Please provide your dob!" );
            document.myForm.dob.focus() ;
            return false;
         }

          else if(document.getElementById("age").value == "" ) {
            alert( "Please provide your age!" );
            document.myForm.age.focus() ;
            return false;
         }

          else if(document.getElementById("edu").value == "" ) {
            alert( "Please provide your education!" );
            document.myForm.edu.focus() ;
            return false;
         }

          if(document.getElementById("gender").value  == "" ) {
            alert( "Please provide your gender!" );
            document.myForm.gender.focus() ;
            return false;
         }

          if(document.getElementById("address").value  == "" ) {
            alert( "Please provide your address!" );
            document.myForm.address.focus() ;
            return false;
         }

          else if( document.getElementById("pwd").value  == "" ) {
            alert( "Please provide your password!" );
            document.myForm.pwd.focus() ;
            return false;
         }

         else if(document.getElementById("pwd_repeat").value  == "" ) {
            alert( "Please provide your password!" );
            document.myForm.pwd_repeat.focus() ;
            return false;
         }

         else if( document.getElementById("photo").value  == "" ) {
            alert( "Please select photo!" );
            document.myForm.photo.focus() ;
            return false;
         }

         else if( document.getElementById("term").value  == "" ) {
            alert( "Please accept condition" );
            document.myForm.term.focus() ;
            return false;
         }
         else if( document.getElementById("captcha").value  == "" ) {
            alert( "Please enter captcha" );
            document.myForm.captcha.focus() ;
            return false;
         }
         // if( document.myForm.Zip.value == "" || isNaN( document.myForm.Zip.value ) ||
         //    document.myForm.Zip.value.length != 5 ) {
            
            // alert( "Please provide a zip in the format #####." );
         //    document.myForm.Zip.focus() ;
         //    return false;
         // }
         // if( document.myForm.Country.value == "-1" ) {
         //    alert( "Please provide your country!" );
         //    return false;
         // }
         else{
         return( true );}
      }



   function validateEmail() {
         var emailID = document.myForm.mail.val();
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) {
            alert("Please enter correct email ID")
            document.myForm.mail.focus() ;
            return false;
         }
         return( true );
      }
</script>

</main>

 <?php 

require "templets/footer.php"; ?>