<?php 
	date_default_timezone_set("Africa/Nairobi");
	session_start();

	// server variable declaration 
	$username = "";
	$email    = "";
	$distname = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	$cdate = date("Y-m-d");
	$ctime = date("h:i a");
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'dkut_coke');

	// REGISTER ADMIN
	if (isset($_POST['reg_dist'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$distname = mysqli_real_escape_string($db, $_POST['distname']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$status = 'INNACTIVE';
		$accountstatus = 'PENDING';

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($distname)) { array_push($errors, "Insert Your Distribution name"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		$sql_u = "SELECT * FROM distributors WHERE username='$username' OR distemail='$email' OR distname='$distname' ";
		$res_u = mysqli_query($db, $sql_u);
		if (mysqli_num_rows($res_u) > 0) { array_push($errors, "username, distributor name or email has already been taken"); }
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO distributors (username, distemail, distname, password,dateadded,timeadded, status, accountStatus) 
					  VALUES('$username', '$email', '$distname','$password','$cdate','$ctime','$status',$accountstatus')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// LOGIN ADMIN
	if (isset($_POST['login_distributor'])) {
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
			$query = "SELECT * FROM distributors WHERE username='$username' AND password='$password'";
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

	//update_dist
	if (isset($_POST['update_dist'])) {
		$distoname = mysqli_real_escape_string($db, $_POST['distoname']);
		$distemail = mysqli_real_escape_string($db, $_POST['distemail']);
		$distel = mysqli_real_escape_string($db, $_POST['distel']);
		$distlocation=  mysqli_real_escape_string($db, $_POST['distlocation']);
		$description = mysqli_real_escape_string($db, $_POST['description']);

		$userid =mysqli_real_escape_string($db, $_POST['uid']);
		$lat = mysqli_real_escape_string($db, $_POST['lat']);
		$lng =mysqli_real_escape_string($db, $_POST['lng']);

		if (empty($distoname)) { array_push($errors, "Your names are required"); }
		if (empty($distemail)) { array_push($errors, "email required"); }
		if (empty($distel)) { array_push($errors, "Telephon number required"); }
		if (empty($distlocation)) { array_push($errors, "Inpout locatiion of your distributione"); }
		if (empty($description)) { array_push($errors, "Insert a brief description"); }
		
		// form validation: ensure that the form is correctly filled
		$phone = $distel;
		function validate_phone_number($phone)
		{
			// Allow +, - and . in phone number
			$filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
			// Remove "-" from number
			$phone_to_check = str_replace("-", "", $filtered_phone_number);
			// Check the lenght of number
			// This can be customized if you want phone number from a specific country
			if (strlen($phone_to_check) < 9 || strlen($phone_to_check) > 11) {
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
			$query = "UPDATE distributors
						SET
							distoname ='$distoname',
							distemail ='$distemail',
							distel ='$distel',
							distlocation ='$distlocation',
							description ='$description',
							lat ='$lat',
							lng='$lng'
						WHERE 
							id ='$userid'";
			$result = mysqli_query($db, $query);
		
			header('location:profile.php');
		}
	}

	if (isset($_POST['gradetask'])) {
		$taskid  = mysqli_real_escape_string($db, $_POST['taskid']);
		$remarks = mysqli_real_escape_string($db, $_POST['remarks']);
		$grades = mysqli_real_escape_string($db, $_POST['grade']);
		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "UPDATE tasks 
						SET 
							distributorremarks = '$remarks',
							distributorgrade = '$grades'
						WHERE
							id ='$taskid'
						";

			$result = mysqli_query($db, $query);

			if($result)
				echo "<script type='text/javascript'>alert('Task Successfully assigned!')</script>";
			else
				echo "<script type'text/javascript'>alert('Something Went Wrong!!')</script>";
			
			header('location:visits.php');
			
		}

	}
?>