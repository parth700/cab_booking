<?php
include_once('configuration.php');
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
	if(isset($_POST))
	{
		$add = $_POST['add'];
		//echo $add;
		$user = $_SESSION['username'];
		//echo $user;
		$wallet = $_SESSION['add_wallet'];
		//echo $wallet;
		$up_wallet = $add + $wallet; 
		//echo $up_wallet;
		$sql_query= "UPDATE users SET wallet =  $up_wallet  WHERE firstname= '" .$user."' ";
	    $result = mysqli_query($db,$sql_query);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>adding...</title>
</head>
<body>
	<script >
		alert("succesfully added")
		setTimeout("location.href = 'dashboard.php'",30);
	</script>
</body>
</html>