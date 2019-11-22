<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Coke Distributor</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

	<div class="header">
		<h2>Coke Distributor Login</h2>
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
			<button type="submit" class="btn" name="login_distributor">Login</button>
        </div>
        <div class="input-group">
			<p>Register your <a href="register.php"> Distribution</a></p>
        </div>
        
	</form>


</body>
</html>