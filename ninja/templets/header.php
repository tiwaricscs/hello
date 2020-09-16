<?php 
    session_start();
 ?>
<html>
<head>
    <meta charset="utf-8">
<meta name="description" content="this is an example of a meta description. this will often show up in search results.">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ninja pizza</title>
	 <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style type="text/css">
    	
    	.brand{
    		background: #cbb09c !important;
    	}

    	.brand-text{
    		color: #cbb09c !important;
    	}

    	form{
    		max-width: 460px;
    		margin: 20px auto;
    		padding:20px;
    	}

        .pizza{
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px
        }
        
    </style>
</head>
<body class="grey lighten-4">
	<nav class="white z-depth-0">

		<div class="container">
			<a href="index.php" class="center brand-logo brand-text">ninja pizza</a>
			<ul id="nav-mobile" class="right hide-on-small-and-down">
			
           
            <?php 

            if (isset($_SESSION['user'])) {

                echo '<li><span class="brand-text">hello '.$_SESSION['user'].'</span></li>';
                echo '<li><a href="includes/logout.inc.php" class="btn brand z-depth-0">log out</a></li>';
              echo '<li><a href="add.php" class="btn brand z-depth-0">add a pizza</a></li>';
                
            }else{
                echo '<li><span class="brand-text">hello guest</span></li>';
                echo '<li><a href="signup.php" class="btn brand z-depth-0">sign up</a></li>
             <li><a href="signin.php" class="btn brand z-depth-0">sign in</a></li>';
            }
             ?>
            

</ul>
		</div>

        
	</nav>