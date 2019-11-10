<?php
include_once('configuration.php');
session_start();



if(isset($_POST)){

	$firstname 		= $_POST['firstname'];
	$lastname 		= $_POST['lastname'];
	$email 			= $_POST['email'];
	$phonenumber	= $_POST['phonenumber'];
	$password 		= sha1($_POST['password']);

	//$sql_query = "select count(*) as cntUser from users where email='".$email."'";
	$q1= "SELECT * FROM users where email='$email' ";
	$mysql_get_users = mysqli_query($db,$q1);
	$get_rows1 = mysqli_affected_rows($db);
	if($get_rows1 >= 1){
			echo 'user with same email exist ';
			die();
		}

    else{
    	$sql = "INSERT INTO users (firstname, lastname, email, phonenumber, password,wallet ) VALUES('$firstname','$lastname','$email','$phonenumber','$password',0)";
		//$stmtinsert = $db->prepare($sql);
		//$result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password]);
		$result = mysqli_query($db,$sql);
		$get_rows = mysqli_affected_rows($db);
		//$row1 = $result-> fetch_assoc() ;

		if($get_rows >= 1){
			$_SESSION['loggedin'] = true;
            $_SESSION['username'] = $firstname;
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
			//echo $get_rows;
		}
    }

		
}else{
	echo 'No data';
}
?>