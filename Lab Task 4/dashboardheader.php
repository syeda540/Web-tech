<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
 <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet"> 
    
</head>
<body>
    <?php echo '<link href="style.css" rel="stylesheet" type="text/css" />';
    ?>
    <div class="full-wrapper">
        <div class="container-wrapper">
        <div  class="main-navbar">
    <div class="logo">
    <a href="homeform.php">

    <h1><span class="c-big">X</span>Company</h1></div>
    </a>    
    <div class="nav-links">
        <ul>
            <!-- <li><a href="login.php">Admin Panel</a>  </li> -->
            <!-- <li><a href="registration.php">User Panel</a>  </li> -->
            <li><a href="userlogin.php"><?php
		session_start();
	//   echo  $_SESSION['user'];
      echo "<h3>". "Logged In As " . $_SESSION['name'] ." | " . " Logout". "</h3>";
	
	?></a> </li>
            <!-- <li><a href="registration.php">Customer Service</a> </li> -->
        </ul>
    </div>
</div>



        </div>
        
    

    </div>
   
    
</body>
</html>