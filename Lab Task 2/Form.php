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
	$nameErr = $emailErr = $genderErr = $websiteErr = $degreeErr = $bloodErr = $dateofbirthErr = "";
	$name = $email = $gender = $comment = $website = $degree = $date = $month = $year = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
				$nameErr = "Only letters and white space allowed";
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
			<legend>Name:</legend>
			<input type="text" name="name">
			<span class="err">*
				<?php echo $nameErr; ?>
			</span><br><br>
			<br>
			<br>
			<br>
			<br>
			<br>

		</fieldset>

		<fieldset>
			<legend>E-mail: </legend>
			<input type="text" name="email">
			<span class="err">*
				<?php echo $emailErr; ?>
			</span><br><br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</fieldset>


		<fieldset>
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
				<?php echo $dateofbirthErr; ?>
			</span>



			<br><br>
			<br><br>
			<br><br>
		</fieldset>

		<fieldset>


			<legend>GENDER</legend>
			<input type="radio" name="gender" value="female">Female
			<input type="radio" name="gender" value="male">Male
			<input type="radio" name="gender" value="other">Other
			<span class="err">*
				<?php echo $genderErr; ?>
			</span>
			<br><br>
			<br><br>
			<br><br>
		</fieldset>

		<fieldset>

			<legend>DEGREE</legend>
			<input type="checkbox" id="SSC" name="degree[]" value="ssc">
			<label for="SSC"> SSC</label>
			<input type="checkbox" id="hsc" name="degree[]" value="hsc">
			<label for="hsc"> HSC</label>

			<input type="checkbox" id="bsc" name="degree[]" value="bsc">
			<label for="bsc"> BSC</label>
			<input type="checkbox" id="msc" name="degree[]" value="msc">
			<label for="msc"> MSC</label>
			<span class="err">*
				<?php echo $degreeErr; ?>
			</span>


			<br><br><br>
		</fieldset>
		<fieldset>
			<legend>
				BLOOD GROUP
			</legend>

			<select name="bGroups" id="bloodgroup">
			<option value =""></option>

				<option value="A+">A+</option>
				<option value="B+">B+</option>



			</select>
			<span class="err">*
				<?php echo $bloodErr; ?>
			</span>
			<br>
			<br>
			<br>
			<br>
		</fieldset>
		<br>
		<br>
		<input type="submit" value="Submit">
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