<?php  
require_once 'controller/productinfo.php';

$students = fetchAllStudents();


    include "nav.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>NAME</th>
			<th>PROFIT</th>
	
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($students as $i => $student): ?>
			<tr>
				<td><a href="showProducts.php?id=<?php echo $student['ID'] ?>"><?php echo $student['Name'] ?></a></td>
				<td><?php echo ($student['Username'] - $student['Surname'] ) ?></td>
				
				
				<td>
					<a href="editProduct.php?id=<?php echo $student['ID'] ?>">Edit</a>
					&nbsp
					<a href="controller/deleteProduct.php?id=<?php echo $student['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>