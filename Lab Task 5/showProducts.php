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

<table>
	<tr>
	<th>NAME</th>
	<th>PROFIT</th>
	
	<th>ACTION</th>
	</tr>
	<tr>
		<td><a href="showStudent.php?id=<?php echo $student['ID'] ?>"><?php echo $student['Name'] ?></a></td>
		<td><?php echo $student['Surname'] ?></td>
		<td><?php echo ($student['Username'] - $student['Surname'] ) ?></td>
		
	</tr>

</table>


</body>
</html>