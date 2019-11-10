<?php
include_once('configuration.php');
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
	$date = date('Y-m-d ');
	//echo $date;
	$fare= $_SESSION['fare'];
	$up_wallet = $_SESSION['wallet']-$_SESSION['fare'];
	$user = $_SESSION["username"];
	$sql_query= "UPDATE users SET wallet =  $up_wallet  WHERE firstname= '" .$user."' ";
	$result = mysqli_query($db,$sql_query);
	$sql_query1 = "SELECT * FROM users WHERE firstname= '" .$user."' ";
	$result1 = mysqli_query($db,$sql_query1);
	$pos1 = $_SESSION['pos1'];
	$pos2 = $_SESSION['pos2'];
	$query1 = "INSERT INTO history (user, pos1, pos2, fare, bookdate) VALUES ('$user', '$pos1', '$pos2','$fare','$date') ";
	$res = mysqli_query($db,$query1);
	//$get_rows = mysqli_affected_rows($db);
	//echo $get_rows;
?>

<!DOCTYPE html>
<html>
<head>
	<title>redirecting..</title>
	<style type="text/css">
		div {
    height: 200px;
    width: 400px;
    background: #F3588E;

    position: fixed;
    top: 50%;
    left: 50%;
    margin-top: -100px;
    margin-left: -200px;
}
	</style>
</head>
<body>

	<div style="font-size:1.25em;color:#0e3c68;font-weight:bold">Thank You for using our service!!</div>
	<script >
		setTimeout("location.href = 'dashboard.php'",1000);
	</script> 
</body>
</html>