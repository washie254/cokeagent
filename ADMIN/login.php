<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>COKE ADMIN LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

	<div class="header">
		<h2><img src="images/logo.png"><br>|: ADMIN LOGIN: |</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_admin">Login</button>
		</div>
	
	</form>


</body>
</html>