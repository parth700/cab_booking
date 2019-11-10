<?php
require_once('config.php');
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
	<div>
		<?php
			
		?>
	</div>

<div>
	<form action="login.php" method="post">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
					<h1>login</h1>
					<p>login with email</p>
					<hr class="mb-3">
					
					<label for="email"><b>Email Address</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="login" name="login" value="Login">
               <input type="reset" class="btn btn-default" value="Reset">
				</div>
			</div>
         <p>do not have an account? <a href="registration.php">signup here</a>.</p>
         <a href="login_admin.php">AdminLogin</a>
		</div> 
	</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> 
<script type="text/javascript">
	$(function(){
		$('#login').click(function(e){
			var valid = this.form.checkValidity();
			if(valid){
			var email 		= $('#email').val();
			var password 	= $('#password').val();
			
				e.preventDefault();	
				$.ajax({
					type: 'POST',
					url: 'process_lg.php',
					data: {email: email,password: password},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								}).then(function() {
                        window.location = "dashboard.php";});
							
					},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
					}
				});
				
			}else{
				
			}
			
		});		
		
	});
	
</script>

</body>
</html>