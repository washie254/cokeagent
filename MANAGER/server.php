<?php 
	session_start();

	// server variable declaration 
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	$cdate = date("Y-m-d");
	$ctime = date("h:s a");

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

	//DEACTIVATE AGENT 
	if (isset($_POST['deactivate_agent'])) {
		$reason = mysqli_real_escape_string($db, $_POST['reason']);
		$agentid = mysqli_real_escape_string($db, $_POST['agentid']);


		$cdate = date("Y-m-d");
		$ctime = date("h:i:s");
		$status = 'DEACTIVATED';

		if (empty($reason)){ array_push($errors, "reason for deactivation is needed !"); }
		if (empty($agentid )){ array_push($errors, "could not process agent identity !"); }
	
		if (count($errors) == 0) {
			$query = "UPDATE agents 
						SET
							status = '$status',
							deactreason = '$reason',
							deactdate = '$cdate',
							reactdate = '',
							reactreason=''
						WHERE 
						  	id='$agentid' ";
			$result = mysqli_query($db, $query);
			if($result)
				echo "<script type='text/javascript'>alert('Manager Deactivated successfully!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:agents.php');

		}

	}
	//DEACTIVATE AGENT 
	if (isset($_POST['activate_agent'])) {
		$reason = mysqli_real_escape_string($db, $_POST['reason']);
		$agentid = mysqli_real_escape_string($db, $_POST['agentid']);


		$cdate = date("Y-m-d");
		$ctime = date("h:i:s");
		$status = 'ACTIVE';

		if (empty($reason)){ array_push($errors, "reason for reactivation is needed !"); }
		if (empty($agentid )){ array_push($errors, "could not process agent identity !"); }
	
		if (count($errors) == 0) {
			$query = "UPDATE agents 
						SET
							status = '$status',
							deactreason = '',
							deactdate = '',
							reactdate = '$cdate',
							reactreason='$reason'
						WHERE 
						  	id='$agentid' ";
			$result = mysqli_query($db, $query);
			if($result)
				echo "<script type='text/javascript'>alert('Manager Deactivated successfully!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:agents.php');

		}

	}

	//approve_dist
	if (isset($_POST['approve_dist'])) {
		$remarks = mysqli_real_escape_string($db, $_POST['remarks']);
		$manager = mysqli_real_escape_string($db, $_POST['manager']);
		$distid = mysqli_real_escape_string($db, $_POST['distid']);


		$cdate = date("Y-m-d");
		$status = 'APPROVED';

		//if (empty($remarks )){ array_push($errors, "could not process agent identity !"); }
	
		if (count($errors) == 0) {
			$query = "UPDATE distributors
						SET
							accountStatus = '$status',
							manager = '$manager',
							approvalremarks = '$remarks',
							dapprovedrej='$cdate'
						WHERE 
						  	id='$distid' ";
			$result = mysqli_query($db, $query);

			$query0 ="INSERT INTO inventory (distributor, maxdasani, maxsoda, reorderdasani, reordersoda, minsoda, mindasani, currentdasani,currentsoda) 
									VALUES ('$distid','0','0','0','0','0','0','0','0')";
			mysqli_query($db, $query0);

			if($result)
				echo "<script type='text/javascript'>alert('Manager Deactivated successfully!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:distributors.php');

		}

	}
	//approve_dist
	if (isset($_POST['reject_dist'])) {
		$remarks = mysqli_real_escape_string($db, $_POST['remarks']);
		$manager = mysqli_real_escape_string($db, $_POST['manager']);
		$distid = mysqli_real_escape_string($db, $_POST['distid']);


		$cdate = date("Y-m-d");
		$status = 'REJECTED';

		//if (empty($remarks )){ array_push($errors, "could not process agent identity !"); }
	
		if (count($errors) == 0) {
			$query = "UPDATE distributors
						SET
							accountStatus = '$status',
							manager = '$manager',
							approvalremarks = '$remarks',
							dapprovedrej='$cdate'
						WHERE 
						  	id='$distid' ";
			$result = mysqli_query($db, $query);
			if($result)
				echo "<script type='text/javascript'>alert('Manager Deactivated successfully!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:distributors.php');

		}

	}

	//DEACTIVATE A DISTRIBUTOR
	if (isset($_POST['deact_dist'])) {
		$reason = mysqli_real_escape_string($db, $_POST['reason']);
		$distid = mysqli_real_escape_string($db, $_POST['distid']);

		$status = 'INNACTIVE';

		if (empty($reason)){ array_push($errors, "Kindly Provide a reason for deactivating !"); }
	
		if (count($errors) == 0) {
			$query = "UPDATE distributors
						SET
							status = '$status',
							reason4deact = '$reason',
							actdeactdate='$cdate'
						WHERE 
						  	id='$distid' ";
			$result = mysqli_query($db, $query);
			if($result)
				echo "<script type='text/javascript'>alert('Manager Deactivated successfully!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:distributors.php');

		}

	}

	///ACTIVATE DISTRIBUTOR
	if (isset($_POST['act_dist'])) {
		$reason = mysqli_real_escape_string($db, $_POST['reason']);
		$distid = mysqli_real_escape_string($db, $_POST['distid']);

		$status = 'ACTIVE';

		if (empty($reason)){ array_push($errors, "Kindly Provide a reason for deactivating !"); }
	
		if (count($errors) == 0) {
			$query = "UPDATE distributors
						SET
							status = '$status',
							reason4deact = '$reason',
							actdeactdate='$cdate'
						WHERE 
						  	id='$distid' ";
			$result = mysqli_query($db, $query);
			if($result)
				echo "<script type='text/javascript'>alert('Manager Deactivated successfully!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:distributors.php');

		}

	}

	
	// Allocate Inventory Task to agent
	if (isset($_POST['allocate_inventory'])) {
		$agentid = mysqli_real_escape_string($db, $_POST['agentid']);
		$agentname = mysqli_real_escape_string($db, $_POST['agentname']);
		$distid = mysqli_real_escape_string($db, $_POST['distid']);
		$instructions = mysqli_real_escape_string($db, $_POST['instructions']);
		$tstatus = 'PENDING';
		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO tasks (agentid, agent, distributor, description, datecreated, timecreated, status)
							VALUES('$agentid','$agentname', '$distid','$instructions','$cdate','$ctime', '$tstatus')";
			$result = mysqli_query($db, $query);
			if($result)
				echo "<script type='text/javascript'>alert('Task Successfully assigned!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:allocatetasks.php');
			
		}

	}

	//alocate merchandise distribution 
	if (isset($_POST['allocate_merchandise'])) {
		$agentid = mysqli_real_escape_string($db, $_POST['agentid']);
		$distid = mysqli_real_escape_string($db, $_POST['distid']);
		$mernames = mysqli_real_escape_string($db, $_POST['mername']);
		$amount = mysqli_real_escape_string($db, $_POST['amount']);
		$instructions = mysqli_real_escape_string($db, $_POST['instructions']);
		$tstatus = 'PENDING';
		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO marchandise (marname, amount, distid, agentid, instructions, dateassigned,status)
							VALUES('$mernames','$amount', '$distid','$agentid','$instructions','$cdate', '$tstatus')";
			$result = mysqli_query($db, $query);
			if($result)
				echo "<script type='text/javascript'>alert('Task Successfully assigned!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:allocatetasks.php');
			
		}

	}

?>