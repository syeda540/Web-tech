<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
echo '<link href="style.css" rel="stylesheet" type="text/css" />';

$passErr = "";
$pass = $retypePassword = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$ccrntPass = "abc@1234";
	$newPass = ($_POST['Npass']);
	$retypePass = ($_POST["Rpass"]);

	if (empty($_POST["Npass"]) & empty($_POST["Rpass"])) {
		$passErr = "Password is required";
	}
	elseif($ccrntPass == $newPass){
		$passErr = "New Password should not be same as the Current Password";
	}
	elseif($newPass != $retypePass ){
		$passErr = ". New Password must match with the Retyped Password";
	}
	else {
		$pass = test_input($_POST["Npass"]);
		// $re = '/^[a-zA-Z0-9_]{8,}\d*$/';
		$re = '/^(?!.* )(?=.*[^a-zA-Z0-9]).{8,}$/m';
		// check if name only contains letters and whitespace
		if (!preg_match($re, $pass, $matches)) {
			$passErr = "Password must not be less than eight (8) characters
			. Password must contain at least one of the special characters (@, #, $,
			%)
			";
		}
		
	}
}

function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}



?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<fieldset>
			<legend>CHANGE PASSWORD: </legend>
			<br>
			<!-- <input type="text" name="email"> -->
			<label for="pass">Current password: </label>

			<input type="text" value="abc@1234" name="Cpass">
		<span class="err">*
			
			</span><br><br>
			<label for="pass">New password: </label>

			<input type="text" name="Npass">
		<span class="err">*
		<?php echo $passErr; ?>
			</span><br><br>
			<label for="pass">Retype New password: </label>

			<input type="text" name="Rpass">
		<span class="err">*
		<?php echo $passErr; ?>
			</span><br><br>
			<input type="submit" value="submit " name="" id="">
			<br>
			<br>
			
		</fieldset>

	</form>
    
</body>
</html>