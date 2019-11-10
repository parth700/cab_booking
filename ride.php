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
	<title>book</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
	<div class="page-header" style="background-color: #F196F9">
       <h1><i>select intitial and final destinations</i></h1>
    </div>
    <div>
    	<form action="process_ride.php" method="post">
    		Select initial location:
    	<select name="loc1">
    		<option value="">--choose a location--</option>
    		<option value="holigate">Holigate</option>
    		<option value="masani">Masani</option>
    		<option value="maholiroad">MaholiRoad</option>
    		<option value="atalla">Atalla</option>
    		<option value="goverdhan">Goverdhan</option>
    	</select>
    	<br><br><br><br><br><br><br><br><br>
    	Select final location:
    	<select name="loc2">
    		<option value="">--choose a location--</option>
    		<option value="holigate">Holigate</option>
    		<option value="masani">Masani</option>
    		<option value="maholiroad">MaholiRoad</option>
    		<option value="atalla">Atalla</option>
    		<option value="goverdhan">Goverdhan</option>
    	</select>
    	<br><br><br><br><br><br>
    	<input class="btn btn-primary" type="submit" id="ok" name="ok" value="ok">
    	</form>
    </div>
</body>
</html>