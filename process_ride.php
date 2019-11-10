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
 	<title>ride</title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
 </head>
 <body>
	<div class="page-header" style="background-color: #F7D477">
       <h1><i>ride control</i></h1>
    </div>

<?php
	if(isset($_POST))
	{
		$pos1 = $_POST["loc1"];
		$pos2 = $_POST["loc2"];
		if(empty($pos1) || empty($pos2))
			{
				echo "<script>
				alert('fill all the feilds');
				setTimeout(\"location.href = 'ride.php';\",15);
				</script>";
			}
		elseif($pos1 == $pos2)
			{
				echo "<script>
				alert('Both locations must be different');
				setTimeout(\"location.href = 'ride.php';\",15);
				</script>";
			}
		else
			{
				$sql_query= "SELECT * FROM destinations WHERE pos1 ='" .$pos1."' && pos2 = '" .$pos2."' ";
				//echo $pos1;
				//echo $pos2;
				$result = mysqli_query($db,$sql_query);
				$row = mysqli_fetch_array($result);
				$fare = $row["fare"];
				$_SESSION['fare'] = $fare;
				$user = $_SESSION["username"];
				$sql_query1= "SELECT * FROM users WHERE firstname ='" .$user."' ";
				$result1 = mysqli_query($db,$sql_query1);
				$row1 = mysqli_fetch_array($result1);
				$wallet = $row1["wallet"];
				$_SESSION['wallet'] = $wallet;
				echo '<div style="font-size:1.25em;color:#0e3c68;font-weight:bold;"> Fare of the journey is : <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;">'.$fare.'</span></div>';
				echo "<br><br><br><br>";
				echo '<div style="font-size:1.25em;color:#0e3c68;font-weight:bold;"> Money in your wallet is : <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;">'.$wallet.'</span></div>';

				$_SESSION['pos1'] = $pos1;
				$_SESSION['pos2'] = $pos2;
				
			}
	}
 ?>
<br><br><br><br><br>
    	<form action="finish.php" method="post">
    		<input class="btn btn-primary" type="submit" id="finish" name="finish" value="finish ride">
    	</form>
					
 </body>
 </html>