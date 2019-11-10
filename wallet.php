<?php
include_once('configuration.php');
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>wallet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header" style="background-color: #90E1E1">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
    </div>
    <br><br><br><br>
<?php
	$user = $_SESSION['username'];
	$query = "SELECT * FROM users WHERE firstname ='" .$user."' ";
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_array($result);
	$_SESSION['add_wallet'] =$row['wallet'];
	echo '<div style="font-size:1.25em;color:#0e3c68;font-weight:bold;"> Money left in your wallet is : <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;">'.$row['wallet'].'</span></div>';
?>

	<br><br><br>
    <a href="add.php" class="btn btn-success">add to money wallet</a>

</body>
</html>