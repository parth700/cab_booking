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
	<title>add</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div>
	<form action="process_add.php" method="post">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
					<p>add money to wallet</p>
					<hr class="mb-3">
					
					<label for="add"><b>Enter amount to be added</b></label>
					<input class="form-control" id="add"  type="number" name="add" required>

					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="ok" name="ok" value="add">
				</div>
			</div>
		</div> 
	</form>
	</div>
</body>
</html>