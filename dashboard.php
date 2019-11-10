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
    <title>dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header" style="background-color: #C7DA93">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Youride.</h1>
    </div>
    <p>
        <!-- <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a> -->
        <a href="ride.php" class="btn btn-warning">Book</a>
        <br><br><br>
        <a href="history.php" class="btn btn-success">past rides</a>
        <br><br><br>
        <a href="wallet.php" class="btn btn-primary">Check your wallet</a>
        <br><br><br>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
        
        
    </p>
</body>
</html>