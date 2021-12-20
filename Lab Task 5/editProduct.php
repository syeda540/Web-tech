<?php 

require_once 'controller/productinfo.php';
$student = fetchStudent($_GET['id']);


 include "nav.php";



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <fieldset>
    <legend>EDIT PRODUCT</legend>
    
    <form action="controller/updateProduct.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input value="<?php echo $student['Name'] ?>" type="text" id="name" name="name"><br>
  <label for="surname">Buying Price:</label><br>
  <input value="<?php echo $student['Surname'] ?>" type="text" id="surname" name="surname"><br>
  <label for="username">Selling Price:</label><br>
  <input value="<?php echo $student['Username'] ?>" type="text" id="username" name="username"><br>
  
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <br>
  <input type="submit" name = "updateStudent" value="Update">
  <input type="reset"> 
</form> 

</fieldset>
</body>
</html>

