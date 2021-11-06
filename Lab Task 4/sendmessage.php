<?php
$messageErr = "";
$message = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // session_start();
    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = test_input($_POST["message"]);
        // check if name only contains letters and whitespace
        
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

<?php include('usermessage.php'); ?>



<div class="userMessage-part">
    <div class="send-message">
        <div class="user-messaging">
            <?php
            echo "<h3>" . $message . "</h3>";
            ?>
        </div>

        <div class="main-form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
        <input type="text" name="message">
        <input class="submit-btn" type="submit" value="Send">
        </form>
        </div>

        </div>

</div>
