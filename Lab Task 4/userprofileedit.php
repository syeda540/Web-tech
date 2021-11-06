
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $message = "";
    if(file_exists('data.json'))  
        {  
             $current_data = file_get_contents('data.json');  
             $array_data = json_decode($current_data, true);  
             $input = array(  
                  'name'               =>     $_POST['name'],  
                  'e-mail'          =>     $_POST["email"],  
                   
                //   'gender'     =>     $_POST["gender"],  
                  'pass'     =>     $_POST["pass"],
                  
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


?>


 <div>

<?php include("mainwelcome.php") ?>
<div class="profile-part">

<div class="profile-info">

    <fieldset>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ; ?>">
        <legend>PROFILE</legend>
        <?php
        

       ?>
        <Label>Name: </Label>
       <input type="text" name="name" value="<?php
        echo $_SESSION['name'] ;?>">
        <hr>
        <Label>Email: </Label>
       <input type="text" name="email" value="<?php
        echo  $_SESSION['email'] ; ?>">
        <hr>
        <Label>PassWord: </Label>
       <input type="text" name="pass"value="<?php
        echo  $_SESSION['password'] ;?>">
        <hr>
        <Label>Gendar: </Label>
       <input type="text" value="<?php
        echo $_SESSION['gender'] ;?>">
        <hr>
       
    

    <input type="submit" value="Submit">
    
    
    
    </form>
        
        </fieldset>
</div>

</div>
</div>


