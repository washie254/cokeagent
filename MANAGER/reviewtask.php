<?php 
	include('server.php');
	//session_start(); 
	if(isset($_GET['id'])){
		$taskid = $_GET['id'];
	}

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
	<nav class="navbar navbar-expand-lg  py-4" id="navbar">
		<div class="container">
        
        <!-- <a href="#"><i class="ti-github"></a> -->
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
			  	<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tasks</a>
					<ul class="dropdown-menu" aria-labelledby="dropdown03">
						<li><a class="dropdown-item" href="allocatetasks.php">Allocate</a></li>
						<li><a class="dropdown-item" href="allocated.php">Allocated Tasks</a></li>
						<li><a class="dropdown-item" href="distributors.php">Distributors</a></li>
					</ul>
			  	</li>
			  	<li class="nav-item"><a class="nav-link" href="agents.php">Agents</a></li>
			  	<li class="nav-item"><a class="nav-link" href="Reports.php">Reports</a></li>
				<li class="nav-item"><a class="nav-link" href="profile.php">Pofile</a></li>

              <li style="float:right;" class="nav-link">
                <!-- <i class="ti-user"> -->
                <a href="#" style="color:Yellow"> <b>	
                    <?php  if (isset($_SESSION['username'])):?>
                    <?php echo strtoupper($_SESSION['username']); ?> </b>
                    <?php endif ?>
                </a>
              </li>
              <li class="nav-link">
                <a href="index.php?logout='1'" style="color: red;"><b>logout</b></a>
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
		<P><h2>Task Report</h2></p>
		<div id="Pendingtasks" class="tabcontent" style="padding: 6px 12px; border: 1px solid #ccc;">
			The card below hods the  information  on the task awarded to the agent 

			<?php

				$sql = "SELECT * FROM tasks WHERE id='$taskid'";
				$res = mysqli_query($db, $sql);
				while($row = mysqli_fetch_array($res, MYSQLI_NUM)){
					$remark = $row[9];
					$lat = $row[11];
					$lng = $row[12];
					$distgrade =$row[13];
					$distremarks = $row[14];

					
					$dt = $row[7]." At: ".$row[8];
					$loc=$lat.", ".$lng;
				}
			?>
		<div class="card">
			<div class="card-body">
				Information on the Task:<br>
				<b>Remarks on Distributor:</b>
				<div class="card">
					<div class="card-body">
						<p> <b>grade:<?=$distgrade?></b><br>
							<b>Remarks:<?=$distremarks?></b>
						</p>
					</div>
				</div>
				<br> <b>task Completion  Time $ place: </b>
				<div class="card">
					<div class="card-body">
						<p> <b>Time: &nbsp;&nbsp;  </b><?=$dt?><br>
							<b>Location: </b><?=$loc?><br>
							<b>Feedback: </b><?=$remark?>
						</p>
					</div>
				</div><br>
				<div class="card">
					<div class="card-body">
						<p> <b>Give remarks on the task</b><br></p>
						<form class="form" action="reviewtask.php" method="post">
							<input name="taskid" value="<?=$taskid?>" style="opacity:0.2" readonly/>
							<div class="form-group">
								<div class="col-xs-6">
									<label for="description"><b>Brief description</b></label>
									<textarea type="email" class="form-control" name="remarks" id="remarks" placeholder="insert a brief review on the agent" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-6">
									<label for="description"><b>grade: [out of 5]</b></label>
									<select type="text" class="form-control" name="grade">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3" selected>3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>
							</div>
							<br><button class="btn btn-lg btn-success" type="submit" name="gradetask" style="width:98%;">POST REMARKS</button>
						</form>



					</div>
				</div>
			</div>
		</div>


    	</div>
	</div>
</section>

<!-- Section Intro END -->

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
					<h6><a href="tel:+254-720-870388">+254-720-870388</a></h6>
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
   