<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php 
        include "nav.php";

     ?>
   
   <fieldset>
       <legend>ADD PRODUCT</legend>

       
       <form action="controller/createProduct.php" method="POST" enctype="multipart/form-data">
           <label for="name">Name:</label><br>
           <input type="text" id="name" name="name"><br>
           <label for="surname">Buying Price:</label><br>
           <input type="text" id="surname" name="surname"><br>
           <label for="username">Selling Price:</label><br>
           <input type="text" id="username" name="username"><br>
           <br>
 
  <input type="submit" name = "createStudent" value="Create">
  <input type="reset"> 
</form> 
</fieldset>

</body>
</html>

