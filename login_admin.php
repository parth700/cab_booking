<?php
require_once('config.php');
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin_login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
	<div>
		<?php
			
		?>
	</div>

<div>
	<form action="login_admin.php" method="post">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
					<h1>Admin login</h1>
					<p>fill all the fields</p>
					<hr class="mb-3">
					
					<label for="email"><b>Admin email</b></label>
					<input class="form-control" id="email"  type="password" name="email" required>

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="login" name="login" value="Login">
               <input type="reset" class="btn btn-default" value="Reset">
				</div>
			</div>
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
					url: 'process_ad.php',
					data: {email: email,password: password},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								}).then(function() {
                        window.location = "admin.php";});
							
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