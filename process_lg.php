<?php
session_start();

require_once('configuration.php');
 
if(isset($_POST)){

    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    if ($email != "" && $password != ""){

        //$sql_query = "select count(*) as cntUser from users where email='".$email."' and password='".$password."'";
        
        /* $result = mysqli_query($db,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){

            echo "login";
        }else{
            echo "Invalid username and password";
        }*/
        $sql_query= "SELECT email, password FROM users WHERE email ='" .$email."'";
        $username= "SELECT firstname FROM users WHERE email ='" .$email."'";
        $result1=mysqli_query($db,$username);
        $row1= mysqli_fetch_array($result1);
        $result = mysqli_query($db,$sql_query);

        $row = mysqli_fetch_array($result);

        if($row["email"]==$email && $row["password"]==$password)
        {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row1['firstname'];
            echo"succesfully logged in";
        }
        else
            echo"Sorry, your credentials are not valid, Please try again.";
    }
}
?>
