<?php include('server.php');?>
<?php 
	//session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">
  
  <meta name="author" content="themefisher.com">

  <title>CocaCola | Agent System</title>
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>


<!-- Header Start --> 
<header class="navigation">
	<div class="header-top ">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-2 col-md-4">
					<div class="header-top-socials text-center text-lg-left text-md-left">
						<a href="#"><i class="ti-github"></i></a>
						<a href="#" style="color:Yellow"> <b>	
							<?php  if (isset($_SESSION['username'])):?>
							<?php echo $_SESSION['username']; ?> </b>
						</a>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
						<?php endif ?>
					</div>
				</div>
				<div class="col-lg-10 col-md-8 text-center text-lg-right text-md-right">
					<div class="header-top-info">
						<a href="tel:+254720870388">Call Us : <span>+254-720-870388</span></a>
						<a href="mailto:cokeagentsystem@yahoo.com" ><i class="fa fa-envelope mr-2"></i><span>cokeagentsystem@yahoo.com</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg  py-4" id="navbar">
		<div class="container">
		  <a class="navbar-brand" href="#">
		  	Coca<span>Cola.</span>
		  </a>

		  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			  </li>
			 	<li class="nav-item"><a class="nav-link" href="manager.php">Managers</a></li>
			   <li class="nav-item"><a class="nav-link" href="admin_agents.php">Agents</a></li>
			   
			   <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Report</a>
					<ul class="dropdown-menu" aria-labelledby="dropdown03">
						<li><a class="dropdown-item" href="agents_reports.php">General Reports</a></li>
						<li><a class="dropdown-item" href="distributors_reports.php">Distributor Reports</a></li>
					</ul>
			  </li>
			</ul>
		  </div>
		</div>
	</nav>
</header>

<!-- Header Close --> 

<div class="main-wrapper ">

<section class="section intro">
<div class="container">
    <div style="padding: 6px 12px; border: 1px solid #ccc;height:auto; verflow: auto;">
        <h3>Active Tasks</h3> 
		<p> Agents Assigned tasks that are yet to be completed:</p> 
		
		<table class="table table-bordered">
			<thead>
				<tr>
				<th scope="col">T.Id</th>
				<th scope="col">A:Name</th>
				<th scope="col">Distributor</th>
				<th scope="col">Description</th>
				<th scope="col">Date & Time Assigned</th>
				<th scope="col">Status</th>
				<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<!-- [ LOOP THE REGISTERED AGENTS ] -->
				<?php
				// $con = mysqli_connect('localhost','root','','coke');
			
				// if (!$con) {
				// 	die('Could not connect: ' . mysqli_error($con));
				// }

				$sql = "SELECT * FROM tasks";
				$result = mysqli_query($db, $sql);
				while($row = mysqli_fetch_array($result, MYSQLI_NUM))
				{	
				
					echo '<tr>';
						echo '<td>'.$row[0].'</td> '; //TASK ID 
						echo '<td>'.$row[1].'</td> '; //AGENT USER NAME
						echo '<td>'.$row[2].'</td> '; //DISTRIBUTOR
						echo '<td>'.$row[4].'</td> '; //DESCRIPTION
						echo '<td>'.$row[5]." ".$row[6].'</td> '; //DATE AND TIME CREATED
						echo '<td>'.$row[10].'</td> '; //DATE ADDED
						echo '<td><a href="deltask.php?id=' . $row[0] . '"><button class="btn btn-danger">DELETE</button></a> </td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
    </div>
</div>	

<br>
  <div class="container">
    <div style="padding: 6px 12px; border: 1px solid #ccc;">
        <h3>Assign a New Task</h3> 
		<p> Asssign new task to an agent</p>   
		
		<form method="post" action="admin_index.php">
		<style>
			.error {
				width: 98%; 
				margin: 0px auto; 
				padding: 10px; 
				border: 1px solid #a94442; 
				color: #a94442; 
				background: #f2dede; 
				border-radius: 5px; 
				text-align: left;
			}
		</style>
          <?php include('errors.php'); ?>
          <div class="form-group">
              <label for="exampleAgent">Agent </label>
              <?php
					// $conn = new mysqli('localhost', 'root', '', 'coke') 
					// or die ('Cannot connect to db');  

					$result = $db->query("select id, username FROM agents");
					echo "<select name='agent' class='form-control' style=width:98%>";
						while ($row = $result->fetch_assoc()) {
						unset($id, $name);
						$id = $row['id'];
						$name = $row['username']; 
						echo '<option value="'.$name.'">'.$name.'</option>';      
						}
					echo "</select>";
				?>
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Distributor</label>
			  <?php
					// $conn = new mysqli('localhost', 'root', '', 'coke') 
					// or die ('Cannot connect to db');  

					$result01 = $db->query("select id, distname FROM distributors");
					echo "<select name='distributor' class='form-control' style=width:98%>";
						while ($row = $result01->fetch_assoc()) {
						unset($did, $dname);
						$did = $row['id'];
						$dname = $row['distname']; 
						echo '<option value="'.$dname.'">'.$dname.'</option>';      
						}
					echo "</select>";
				?>
		  </div>
		  <div class="form-group">
              <label for="exampleInputEmail1">Task Category</label>
			  <?php
					// $conn = new mysqli('localhost', 'root', '', 'coke') 
					// or die ('Cannot connect to db');  

					$result02 = $db->query("select id, deptname FROM departments");
					echo "<select name='dept' class='form-control' style=width:98%>";
						while ($row = $result02->fetch_assoc()) {
						unset($id, $name);
						$deptid = $row['id'];
						$deptname = $row['deptname']; 
						echo '<option value="'.$deptname.'">'.$deptname.'</option>';      
						}
					echo "</select>";
				?>
		  </div>
		  <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea type="text" class="form-control" name="description" rows="4" cols="50"placeholder="Enter brief description about the task" ></textarea>
		  </div>
		  <button type="submit" class="btn btn-success" name="add_task" style="width:100%;"><b>ADD TASK</b></button>

		</form>

      </div>
  </div>
</section>



<!-- Section About End -->

<!--  Section Services Start -->
<section class="section service border-top">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<span class="h6 text-color">Our Services</span>
					<h2 class="mt-3 content-title ">We provide a wide range of creative services </h2>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="ti-desktop"></i>
					<h4 class="mb-3">Web development.</h4>
					<p>A digital agency isn't here to replace your internal team, we're here to partner</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="ti-layers"></i>
					<h4 class="mb-3">Interface Design.</h4>
					<p>A digital agency isn't here to replace your internal team, we're here to partner</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="ti-bar-chart"></i>
					<h4 class="mb-3">Business Consulting.</h4>
					<p>A digital agency isn't here to replace your internal team, we're here to partner</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5 mb-lg-0">
					<i class="ti-vector"></i>
					<h4 class="mb-3">Branding.</h4>
					<p>A digital agency isn't here to replace your internal team, we're here to partner</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5 mb-lg-0">
					<i class="ti-android"></i>
					<h4 class="mb-3">App development.</h4>
					<p>A digital agency isn't here to replace your internal team, we're here to partner</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5 mb-lg-0">
					<i class="ti-pencil-alt"></i>
					<h4 class="mb-3">Content creation.</h4>
					<p>A digital agency isn't here to replace your internal team, we're here to partner</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!--  Section Services End -->

<!-- footer Start -->
<footer class="footer section">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget">
					<h4 class="text-capitalize mb-4">The CocaCola Company</h4>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="#">Terms & Conditions</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Support</a></li>
						<li><a href="#">FAQ</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget">
					<h4 class="text-capitalize mb-4">Quick Links</h4>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="admin_index.php">Home</a></li>
						<li><a href="admin_agents.php">Agents</a></li>
						<li><a href="admin_distributors.php">Distributors</a></li>
						<li><a href="admin_agents_reports.php">Agent Reports</a></li>
						<li><a href="admin_distributors_reports.php">Distributor Reports</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget">
					<h4 class="text-capitalize mb-4">Subscribe Us</h4>
					<p>Subscribe to the CocaColaNewsletter  </p>

					<form action="#" class="sub-form">
						<input type="text" class="form-control mb-3" placeholder="Subscribe Now ...">
						<a href="#" class="btn btn-main btn-small">subscribe</a>
					</form>
				</div>
			</div>

			<div class="col-lg-3 ml-auto col-sm-6">
				<div class="widget">
					<div class="logo mb-4">
						<h3>Coca<span>Cola.</span></h3>
					</div>
					<h6><a href="tel:+254-720-870388" >+254-720-870388</a></h6>
					<a href="mailto:cokeagentsystem@yahoo.com"><span class="text-color h4">cokeagentsystem@yahoo.com</span></a>
				</div>
			</div>
		</div>
		
		<div class="footer-btm pt-4">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						&copy; Copyright Reserved to <span class="text-color">CocaCola.</span> by <a href="#"> Freddie</a>
					</div>
				</div>
				<div class="col-lg-6 text-left text-lg-right">
					<ul class="list-inline footer-socials">
						<li class="list-inline-item"><a href="#"><i class="ti-facebook mr-2"></i>Facebook</a></li>
						<li class="list-inline-item"><a href="#"><i class="ti-twitter mr-2"></i>Twitter</a></li>
						<li class="list-inline-item"><a href="#"><i class="ti-linkedin mr-2 "></i>Linkedin</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
   
    </div>

    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.js"></script>
    <script src="js/contact.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
   <!--  Magnific Popup-->
    <script src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>

    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="js/script.js"></script>

  </body>
  </html>
   