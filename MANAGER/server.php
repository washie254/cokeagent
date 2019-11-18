<?php 
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
	if (isset($_POST['login_manager'])) {
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
			$query = "SELECT * FROM managers WHERE username='$username' AND password='$password'";
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
			
			header('location:ndex.php');
			

		}

	}

	if (isset($_POST['update_info'])) {
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$lname = mysqli_real_escape_string($db, $_POST['lname']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$mid = mysqli_real_escape_string($db, $_POST['mid']);

		if (empty($fname)) { array_push($errors, "First name is required"); }
		if (empty($lname)) { array_push($errors, "Last Name is required"); }
		if (empty($phone)) { array_push($errors, "Phone Required"); }
		if (empty($mid)) { array_push($errors, "Could not Resolve your Identity !"); }

		
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

		if (count($errors) == 0) {
			$query = "UPDATE managers
						SET
							fname = '$fname',	
							lname = '$lname',
							email ='$email',
							tel ='$phone',
							email='$email'
						
						WHERE id ='$mid'";
			$result = mysqli_query($db, $query);
		
			header('location:profile.php');
		}


	}
?>