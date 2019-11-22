<?php 
	include('server.php');
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
  <link rel="stylesheet" href="tabs.css">
  <script src="tabs.js"></script>
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
	<h2>Task Allocation</h2> 
	<p>Here you can allocate tasks to agents that are registered in the system and are also '<b>Actively</b>' Operational
    <!-- Tab links -->
    <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Inventory')">Inventory Management</button>
    <button class="tablinks" onclick="openCity(event, 'Merchandise')">Distribution Of Marchandise</button>
    <button class="tablinks" onclick="openCity(event, 'Higlights')">Higlights</button>
    </div>

    <!-- Tab content -->
    <div id="Inventory" class="tabcontent">
    	<h3>Inventory Data Collection</h3>
		<p>Here you can allocate an agent a task to collect inventory levels of a given distributor</p>
		below are the currently available agents [i.e those currently not having a task ]
		<table class="table table-bordered">
			<thead>
				<tr>
				<th scope="col">#id</th>
				<th scope="col">agentname</th>
				<th scope="col">othernames</th>
				<th scope="col">email</th>
				<th scope="col">Telephone</th>
				<th scope="col">Assign</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM agents  WHERE status='ACTIVE'";
				$result = mysqli_query($db, $sql);
				while($row = mysqli_fetch_array($result, MYSQLI_NUM))
				{	
					$agentid = $row[0];

					$sql_u = "SELECT * FROM tasks WHERE agentid='$agentid' AND	status ='PENDING'";
					$res_u = mysqli_query($db, $sql_u);
					if (mysqli_num_rows($res_u) > 0) { 
						
					}else{
						echo '<tr>';
						echo '<td>'.$agentid.'</td> '; 
						echo '<td>'.$row[1].'</td> '; 
						echo '<td>'.$row[2]." ".$row[3].'</td> '; 
						echo '<td>'.$row[5].'</td> '; 
						echo '<td>'.$row[6].'</td> ';
						echo '<td>
								<a href="alocateinventory.php?id='.$row[0].'&agentname='.$row[1].'"><strong><button type="button" class="btn btn-success">Allocate Task</button>
							</td> ';
						echo '</tr>';
					}
				}
				?>
			</tbody>
		</table>
		
    </div>

    <div id="Merchandise" class="tabcontent">
    <h3>Marchandise distribution</h3>
    <p>You can allocate an agent to go hand out some marchanse to a distributor. </p>
		//MARCHANDISE FORM
    </div>
	
    <div id="Higlights" class="tabcontent">
        <h3>TASK| Highlights</h3>
        <p> Highlights or rather Summary of the Allocated tasks will be here</P>
		//Highlights Table | Form
    </div> 
	<div>
	</div>
	<br>
			</section>
<section class="section intro">
  <div class="container">
    <div style="padding: 6px 12px; border: 1px solid #ccc;">
        <h3>Allocate a tak to Agents</h3>
        <p> Fill in the followwing details to allocate tasks to Active agents registered in the  system</p>
		<style>
        .error {
            width: 100%; 
            margin: 0px auto; 
            padding: 10px; 
            border: 1px solid #a94442; 
            color: #a94442; 
            background: #f2dede; 
            border-radius: 5px; 
            text-align: left;
        }
      </style>
        
        <?php require('errors.php'); ?>
		<form class="form" action="profile.php" method="post">
			<div class="form-group">
				<div class="col-xs-6">
					<label for="distoname"><h4>Names of owner</h4></label>
					<input type="text" class="form-control" name="distoname" id="distoname" placeholder="eg john doe" value="<?php echo $rowz['distoname']; ?>" required>
				</div>
        	</div>
        	<div class="form-group">
            	<div class="col-xs-6">
					<label for="distemail "><h4>Email</h4></label>
					<input type="email" class="form-control" name="distemail" id="distemail" value="<?php echo $rowz['distemail']; ?>" required>
            	</div>
        	</div>
			<div class="form-group">
				<div class="col-xs-6">
					<label for="distel"><h4>Phone</h4></label>
					<input type="text" class="form-control" name="distel" id="distel" placeholder="07XX XXX XXX" value="<?php echo $rowz['distel']; ?>" required>
				</div>
			</div>
  
			<div class="form-group">	
				<div class="col-xs-6">
					<label for="distlocation"><h4>Location</h4></label>
					<input type="text" class="form-control" name="distlocation" id="distlocation" value="<?php echo $rowz['distlocation'];?>" required>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-6">
					<label for="description"><h4>Brief description</h4></label>
					<textarea type="email" class="form-control" name="description" id="description" placeholder="insert a brief description partaining your distribution" value="<?php echo $rowz['description'];?>" required></textarea>
				</div>
			</div>


			<div class="form-group">
				<input type="text" id="lat" name="lat" style="opacity: 0.2;" readonly/>
				<input type="text" id="lng" name="lng" style="opacity: 0.2;" readonly/>
				<input type="text" id="uid" name="uid" style="opacity: 0.3;" value="<?=$uid?>" readonly/>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<br>
					<button class="btn btn-lg btn-success" type="submit" name="update_dist" style="width:98%;"><i class="glyphicon glyphicon-ok-sign"></i> UPDATE DISTRIBUTION PROFILE</button>
				</div>
			</div>
		</form>
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
   