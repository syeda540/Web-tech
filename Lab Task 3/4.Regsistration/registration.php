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
$nameErr = $userErr = $passErr =  $emailErr = $genderErr = $dateofbirthErr =   "";
$name = $email = $gender = $userName = $date = $month = $year = $pass = "";

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

    if (empty($_POST["username"])) {
        $userErr = "UserName is required";
    } else {
        $userName = test_input($_POST["username"]);
        
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z0-9_]{2,}\d*$/", $userName)) {
            $nameErr = "User Name can contain alpha numeric characters, period, dash or
            underscore only. User Name must contain at least two (2) characters";
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

   

    if (empty($_POST["bGroups"])) {
        $bloodErr = "Must be selected";
    } else {
        //$comment = test_input($_POST["comment"]);
    }

    $message = "";
    
    if(file_exists('data.json'))  
        {  
             $current_data = file_get_contents('data.json');  
             $array_data = json_decode($current_data, true);  
             $input = array(  
                  'name'               =>     $_POST['name'],  
                  'e-mail'          =>     $_POST["email"],  
                  'username'     =>     $_POST["username"],  
                  'gender'     =>     $_POST["gender"],  
                  'npass'     =>     $_POST["Npass"],
                  'rpass'     =>     $_POST["Rpass"]
              );  
             $array_data[] = $input;  
             $final_data = json_encode($array_data);  
             if(file_put_contents('data.json', $final_data))  
             {  
                  $message = "<label class='text-success'>File store Success fully</p>";  
             }  
        }  
        else  
        {  
             $error = 'JSON File not exits';  
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
		<legend>REGISTRATION</legend>
		<label for="name">Name: </label>
		<input type="text" name="name">
		<span class="err">*
			<?php echo $nameErr; ?>
		</span><br><br>
        <hr>
        <label for="email">Email: </label>
		<input type="text" name="email">
		<span class="err">*
			<?php echo $emailErr; ?>
		</span><br><br>
        <hr>
        <label for="name">User Name: </label>
		<input type="text" name="username">
		<span class="err">*
			<?php echo $userErr; ?>
		</span><br><br>
		<hr>
        <label for="pass">Password: </label>

			<input type="text" name="Npass">
		<span class="err">*
		<?php echo $passErr; ?>
			</span><br><br>
            <hr>
			<label for="pass">Confirm password: </label>

			<input type="text" name="Rpass">
		<span class="err">*
		<?php echo $passErr; ?>
			</span><br><br>
            <hr>

            <fieldset>


			<legend>GENDER</legend>
			<input type="radio" name="gender" value="Male">Female
			<input type="radio" name="gender" value="Female">Male
			<input type="radio" name="gender" value="other">Other
			<span class="err">*
				<?php echo $genderErr; ?>
			</span>
			<br><br>
			<br><br>
			<br><br>
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
			
			
			<br>
			<input type="submit" value="submit">
		</fieldset>
	</form>
    <?php
    if(isset($message)){
        echo $message;
    }

?>
    <?php

	echo "<h1>Your input</h1>";
	echo $name . "<br>";
	echo $email . "<br>";
	echo $gender . "<br>";
	echo $userName . "<br>";
	echo $date . " " . $month . " " . $year;
	// echo $degree . "<br>";
	// echo $website;

	?>
    
</body>
</html>