<?php
session_start();

require_once('configuration.php');
 
if(isset($_POST)){

    $email = $_POST['email'];
    $password = ($_POST['password']);

    if ($email != "" && $password != ""){
        
        if($email == 'admin@gmail.com' && $password == 'admin')
        {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = 'admin';
            echo"succesfully logged in";
        }
        else
            echo"Sorry, your credentials are not valid, Please try again.";
    }
}
?>
