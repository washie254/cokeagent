<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>COKE AGENT LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

	<div class="header">
		<h2>AGENT LOGIN</h2>
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
			<button type="submit" class="btn" name="login_agent">Login</button>
        </div>
        <div class="input-group">
			<p>Login as <a href="login_admin.php">ADMIN</a></p>
        </div>
        
	</form>


</body>
</html>