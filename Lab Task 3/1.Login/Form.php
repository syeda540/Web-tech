<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		/* <link href="login.css" rel="stylesheet" type="text/css" > */
	</style>
</head>

<body>

	<?php



	echo '<link href="style.css" rel="stylesheet" type="text/css" />';


	// define variables and set to empty values
	$nameErr = $emailErr = $genderErr = $websiteErr = $degreeErr = $bloodErr = $dateofbirthErr = $passErr = "";
	$name = $email = $gender = $comment = $website = $degree = $date = $month = $year = $pass = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
			
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z0-9_]{2,}\d*$/", $name)) {
				$nameErr = "User Name can contain alpha numeric characters, period, dash or
				underscore only. User Name must contain at least two (2) characters";
			}
		}

		if (empty($_POST["password"])) {
			$passErr = "Password is required";
		} else {
			$pass = test_input($_POST["password"]);
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

		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			}
		}

		if (empty($_POST["website"])) {
			$website = "";
		} else {
			$website = test_input($_POST["website"]);
			// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
			if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
				$websiteErr = "Invalid URL";
			}
		}

		
		if (empty($_POST["date"])) {
			$dateofbirthErr = "Date is required";
		} else {
			$date = test_input($_POST["date"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[1-31' ]*$/", $date)) {
				$dateofbirthErr = "Must be valid numbers
				(dd: 1-31, mm: 1-12,
				yyyy: 1953-1998)";
			}
		}
		if (empty($_POST["month"])) {
			$dateofbirthErr = "Month is required";
		} else {
			$month = test_input($_POST["month"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[1-12' ]*$/", $month)) {
				$dateofbirthErr = "Must be valid numbers
				(dd: 1-31, mm: 1-12,
				yyyy: 1953-1998)";
			}
		}
		if (empty($_POST["year"])) {
			$dateofbirthErr = "Year is required";
		} else {
			$year = test_input($_POST["year"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^(195[3-9]|19[6-8][0-9]|199[0-8])$/", $year)) {
				$dateofbirthErr = "Must be valid numbers
				(dd: 1-31, mm: 1-12,
				yyyy: 1953-1998)";
			}
		}

		if (empty($_POST["gender"])) {
			$genderErr = "At least one of them
		must be selected";
		} else {
			$gender = test_input($_POST["gender"]);
		}

		if (empty($_POST['degree'])) {
			$degreeErr = "Degree is Required";
		} elseif (isset($_POST['degree'])) {
			// $degree = test_input($_POST["degree"]);

			$count_checked = count($_POST['degree'
			]);
			
			if($count_checked>1)
			{
				// $degreeErr = "";
				
			}
			else{
				$degreeErr = "At least two of them
				must be selected";
			}

			// $counts = array();
			// foreach ($_POST['degree'] as $key => $val) {
			// 	if (!isset($counts[$val])) {
			// 		$counts[$val] = 1;
			// 	} else {
			// 		$counts[$val]++;
			// 	}
			// 	echo $key." => ".$val."<br>";
				
			// }
			// print_r($counts);
		}

		if (empty($_POST["bGroups"])) {
			$bloodErr = "Must be selected";
		} else {
			//$comment = test_input($_POST["comment"]);
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
		<legend>Login:</legend>
		<label for="name">User Name: </label>
		<input type="text" name="name">
		<span class="err">*
			<?php echo $nameErr; ?>
		</span><br><br>
		<label for="pass">Password: </label>
		<input type="" name="password">
		<span class="err">*
			<?php echo $passErr; ?>
		</span><br><br>
			
			
			<br>
			<input type="submit" value="submit">
		</fieldset>
	</form>
	
	


	


		<!-- <fieldset>
			<legend>DATE OF BIRTH</legend>

			<div class="field-inline-block">
				<label>DD</label>
				<input type="text" name="date" maxlength="2" size="2" class="date-field" />
				
			</div>
			/
			<div class="field-inline-block">
				<label>MM</label>
				<input type="text" name="month"  maxlength="2" size="2" class="date-field" />
			</div>
			/
			<div class="field-inline-block">
				<label>YYYY</label>
				<input type="text" name="year" maxlength="4" size="4" class="date-field date-field--year" />
			</div>
			<span class="err">*
				
			</span>



			<br><br>
			<br><br>
			<br><br>
		</fieldset> -->

		

		
		
		
	</form>

	<?php

	echo "<h1>Your input</h1>";
	echo $name . "<br>";
	echo $email . "<br>";
	echo $gender . "<br>";
	echo $comment . "<br>";
	echo $date . " " . $month . " " . $year;
	// echo $degree . "<br>";
	// echo $website;

	?>
</body>

</html>