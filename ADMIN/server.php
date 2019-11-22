<?php 
	date_default_timezone_set("Africa/Nairobi");
	session_start();

	// server variable declaration 
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'dkut_coke');

	// REGISTER ADMIN


	// LOGIN ADMIN
	if (isset($_POST['login_admin'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}


	//ADD AGENT
	if (isset($_POST['add_agent'])) {
		$uname = mysqli_real_escape_string($db, $_POST['uname']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$phone = mysqli_real_escape_string($db, $_POST['tel']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$admin = mysqli_real_escape_string($db, $_POST['admin']);
		$cdate = date("Y-m-d");
		$ctime = date("h:i:s");
		$status = 'ACTIVE';
		
		// form validation: ensure that the form is correctly filled
		function validate_phone_number($phone)
		{
			// Allow +, - and . in phone number
			$filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
			// Remove "-" from number
			$phone_to_check = str_replace("-", "", $filtered_phone_number);
			// Check the lenght of number
			// This can be customized if you want phone number from a specific country
			if (strlen($phone_to_check) < 9 || strlen($phone_to_check) > 14) {
			return false;
			} else {
			return true;
			}
		}
		//VALIDATE PHONE NUMBER 
		if (validate_phone_number($phone) !=true) {
			array_push($errors, "Invalid phone number");
		}

		if (empty($uname)) { array_push($errors, "Username is required"); }
		if (empty($phone)) { array_push($errors, "input the tel no"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
	
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO agents (username, email, tel, password, dateCreated, timeCreated,status, admin)
							VALUES('$uname','$email','$phone','$password','$cdate','$ctime','$status','$admin')";
			$result = mysqli_query($db, $query);
			if($result)
				echo "<script type='text/javascript'>alert('Agent Added successfully!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:admin_agents.php');
			
		}

	}


	//LOGIN AGENT
	if (isset($_POST['login_agent'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM agents WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}


	// ADD MANAGER
	if (isset($_POST['add_manager'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$admin = mysqli_real_escape_string($db, $_POST['admin']);

		$cdate = date("Y-m-d");
		$ctime = date("h:i:s");
		$status = 'ACTIVE';
	

		if (empty($username)){ array_push($errors, "manager username is required !"); }
		if (empty($email)){ array_push($errors, "email is required !"); }
		if (empty($password_1)){ array_push($errors, "Password is Required"); }
		
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);
			$query = "INSERT INTO managers (username, email, password, dateadded, status, admin)
								VALUES('$username', '$email','$password','$cdate','$status','$admin')";
			$result = mysqli_query($db, $query);
			if($result)
				echo "<script type='text/javascript'>alert('Manager added successfully!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:manager.php');
			

		}

	}

	//deactivate_manager
	if (isset($_POST['deactivate_manager'])) {
		$reason = mysqli_real_escape_string($db, $_POST['reason']);
		$managerid = mysqli_real_escape_string($db, $_POST['managerid']);


		$cdate = date("Y-m-d");
		$ctime = date("h:i:s");
		$status = 'DEACTIVATED';

		if (empty($reason)){ array_push($errors, "reason for deactivation is needed !"); }
		if (empty($managerid )){ array_push($errors, "could not process manager identity !"); }
	
		if (count($errors) == 0) {
			$query = "UPDATE managers 
						SET
							status = '$status',
							deactreason = '$reason',
							deactdate = '$cdate',
							reactdate = '',
							reactreason=''
						WHERE 
						  	id='$managerid' ";
			$result = mysqli_query($db, $query);
			if($result)
				echo "<script type='text/javascript'>alert('Manager Deactivated successfully!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:manager.php');

		}

	}

	//reactivate_manager
	if (isset($_POST['reactivate_manager'])) {
		$reason = mysqli_real_escape_string($db, $_POST['reason']);
		$managerid = mysqli_real_escape_string($db, $_POST['managerid']);


		$cdate = date("Y-m-d");
		$ctime = date("h:i:s");
		$status = 'ACTIVE';

		if (empty($reason)){ array_push($errors, "reason for re-activation is needed !"); }
		if (empty($managerid )){ array_push($errors, "could not process manager identity !"); }
	
		if (count($errors) == 0) {
			$query = "UPDATE managers 
						SET
							status = '$status',
							reactreason = '$reason',
							deactreason = '', #delete reason for deactivating
							reactdate = '$cdate',
							deactdate=''
						WHERE 
						  	id='$managerid' ";
			$result = mysqli_query($db, $query);
			if($result)
				echo "<script type='text/javascript'>alert('Manager Deactivated successfully!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:manager.php');

		}

	}

	// ADD A NEW DEPERTMENT
	if (isset($_POST['add_department'])) {
		$deptname = mysqli_real_escape_string($db, $_POST['deptname']);
		
		$cdate = date("Y-m-d");

		if (empty($deptname)){ array_push($errors, "You must enter a department name!"); }
		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO departments (deptname, datecreated)
									VALUES('$deptname','$cdate')";
			$result = mysqli_query($db, $query);
			if($result)
				echo "<script type='text/javascript'>alert('Depertmenr added successfully!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:admin_distributors.php');
			

		}

	}

	// ASSIGN A TASK TO AN AGENT
	if (isset($_POST['add_task'])) {
		$agentname = mysqli_real_escape_string($db, $_POST['agent']);
		$distname = mysqli_real_escape_string($db, $_POST['distributor']);
		$deptname = mysqli_real_escape_string($db, $_POST['dept']);
		$description = mysqli_real_escape_string($db, $_POST['description']);
		
		$cdate = date("Y-m-d");
		$ctime = date("h:i:s");
		$tstatus = 'PENDING';

		if (empty($description)){ array_push($errors, "You must enter a brief description of the task!"); }
		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO tasks (agent, distributor, category, description, datecreated, timecreated, status )
									VALUES('$agentname','$distname', '$deptname','$description','$cdate','$ctime', '$tstatus')";
			$result = mysqli_query($db, $query);
			if($result)
				echo "<script type='text/javascript'>alert('Task Successfully assigned!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:index.php');
			

		}

	}
?>