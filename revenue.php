<?php
include_once('configuration.php');
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>revenue</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <style>
		thead {color:green;}
		tbody {color:blue;}
		tfoot {color:red;}

		table, th, td {
  		border: 1px solid black;
  		text-align: center;
  		height: 23px;
		}

		th{
			background-color: #90E1E1;
		}
	</style>
</head>
<body>
	<div class="page-header" style="background-color: #f369aa">
        <h1>Welcome, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
        <h3>Today's Revenue</h3>
    </div>
    <br><br><br>
    <center>
    <table style="width: 50%; ">
    <thead>	
    <tr>
    	<th>username</th>
    	<th>Initial Point</th>
    	<th>Final Point</th>
    	<th>fare</th>
    </tr>
    </thead>

 <?php
	$user = $_SESSION['username'];
	//echo $user;
	$query = "SELECT * FROM history ";
	$res = mysqli_query($db,$query);
	$total = 0;
	if($res-> num_rows >0 )
	{
		while( $row = $res-> fetch_assoc())
		{
			echo "<tr><td>".$row['user']."</td><td>".$row['pos1']."</td><td>".$row['pos2']."</td><td>".$row['fare']."</td></tr>";
			$total = $total + $row['fare'];
		}
		echo "</table>";
		echo"<br><br><br>";
		echo '<div style="font-size:1.25em;color:#0e3c68;font-weight:bold;"> Total revenue of today till now : <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;">'.$total.'</span></div>';
	}
	else
		echo "No rides today till now !!";
?>

</center>


</body>
</html>

