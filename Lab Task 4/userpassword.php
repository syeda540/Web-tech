
<?php include("mainwelcome.php");
$passErr = "";
$pass = $retypePassword = "";

// $ccrntPass ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();


$ccrntPass = $_SESSION['password'];
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

 <div>

 <?php  ?>

<div class="profile-part">

<div class="profile-info">

    <fieldset>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
			<legend>CHANGE PASSWORD: </legend>
			<br>
			<!-- <input type="text" name="email"> -->
			<label for="pass">Current password: </label>

			<input type="text" value="
           
            " name="Cpass">
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
        
        </fieldset>
</div>

</div>
</div>


