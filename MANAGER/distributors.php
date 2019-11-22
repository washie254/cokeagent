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
</head>
<style>
  /* Style the tab */
  .tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  }

  /* Style the buttons that are used to open the tab content */
  .tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
  background-color: #ddd;
  }

  /* Create an active/current tablink class */
  .tab button.active {
  background-color: #ccc;
  }

  /* Style the tab content */
  .tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  } 

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
<script>
  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  } 
</script>
<!-- tabs -->
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
	<h2>Distributors Accounts</h2> 
	<p>Here you can approve distributor accounts, reject distributor accounts. also you can activate and deactivate the 
		approved distributor accounts
    <!-- Tab links -->
    <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Activedistributors')">Active Distributors</button>
    <button class="tablinks" onclick="openCity(event, 'Addagents')">Innactive Distributors</button>
    <button class="tablinks" onclick="openCity(event, 'Departments')">Distributors</button>
    </div>

    <!-- Tab content -->
    <div id="Activedistributors" class="tabcontent">
    <h3>Active Distributors</h3>
    <p>the following are the distributors whoes accounts are approved and are active </p>
    <table class="table table-bordered">
		<thead>
			<tr>
			<th scope="col">#id</th>
			<th scope="col">Disttname</th>
			<th scope="col">User</th>
			<th scope="col">Email.</th>
			<th scope="col">Telephone</th>
			<th scope="col">Location : Coords</th>
			<th scope="col">Account Status</th>
			<th scope="col">Operation Status</th>
			<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM distributors WHERE status='ACTIVE'";
			$result = mysqli_query($db, $sql);
			while($row = mysqli_fetch_array($result, MYSQLI_NUM))
			{	
				echo '<tr>';
					echo '<td>'.$row[0].'</td> '; 
					echo '<td>'.$row[1].'</td> '; 
					echo '<td>'.$row[2].'</td> '; 
					echo '<td>'.$row[3].'</td> '; 
					echo '<td>'.$row[4].'</td> ';
					echo '<td>'.$row[6]." :<br>".$row[11].", ".$row[12].'</td> ';
					echo '<td>'.$row[10].'</td> '; 
					echo '<td>'.$row[9].'</td> '; 
					echo '<td>
							<a href="deactivatedist.php?id='.$row[0].'"><strong><button type="button" class="btn btn-danger">Deactivate</button>
						</td> ';
				echo '</tr>';
			}
			?>
		</tbody>
		</table>
    </div>

    <div id="Addagents" class="tabcontent">
    <h3>Innactive Distributors</h3>
    <p>The distribuors whoes accounts are approve but are innactive</p>

    <table class="table table-bordered">
		<thead>
			<tr>
			<th scope="col">#id</th>
			<th scope="col">Disttname</th>
			<th scope="col">User</th>
			<th scope="col">Email.</th>
			<th scope="col">Telephone</th>
			<th scope="col">Location : Coords</th>
			<th scope="col">Account Status</th>
			<th scope="col">Operation Status</th>
			<th scope="col">Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM distributors WHERE status='INNACTIVE' AND accountStatus='APPROVED' ";
			$result = mysqli_query($db, $sql);
			while($row = mysqli_fetch_array($result, MYSQLI_NUM))
			{	
				echo '<tr>';
					echo '<td>'.$row[0].'</td> '; 
					echo '<td>'.$row[1].'</td> '; 
					echo '<td>'.$row[2].'</td> '; 
					echo '<td>'.$row[3].'</td> '; 
					echo '<td>'.$row[4].'</td> ';
					echo '<td>'.$row[6]." :<br>".$row[11].", ".$row[12].'</td> ';
					echo '<td>'.$row[10].'</td> '; 
					echo '<td>'.$row[9].'</td> '; 
					echo '<td>
							<a href="activatedist.php?id='.$row[0].'"><strong><button type="button" class="btn btn-success">Activate</button>
						</td> ';
				echo '</tr>';
			}
			?>
		</tbody>
		</table>
    </div>

    <div id="Departments" class="tabcontent">
        <h3>Distributors Summary</h3>
        <p>Summary of the Distributor Accounts</p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#id</th>
              <th scope="col">Disttname</th>
              <th scope="col">User</th>
              <th scope="col">Email.</th>
              <th scope="col">Telephone</th>
              <th scope="col">Location : Coords</th>
              <th scope="col">Account Status</th>
              <th scope="col">Operation Status</th>


            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM distributors ";
              $result = mysqli_query($db, $sql);
              while($row = mysqli_fetch_array($result, MYSQLI_NUM))
              {	
              
                  echo '<tr>';
                      echo '<td>'.$row[0].'</td> '; 
                      echo '<td>'.$row[1].'</td> '; 
                      echo '<td>'.$row[2].'</td> '; 
                      echo '<td>'.$row[3].'</td> '; 
                      echo '<td>'.$row[4].'</td> ';
                      echo '<td>'.$row[6]." :<br>".$row[11].", ".$row[12].'</td> ';
                      echo '<td>'.$row[10].'</td> '; 
                      echo '<td>'.$row[9].'</td> '; 
                  echo '</tr>';
              }
            ?>
          </tbody>
        </table>

    </div> 
    <div></div><br>
	<div style="padding: 6px 12px; border: 2px solid #ccc;">
	<div class="container">
    <h2>Distributors pending approval</h2> 
        <p>The following are distributor accounts pending approval</p>
        <div style="padding: 6px 12px; border: 1px solid #ccc;">
			<table class="table table-bordered">
			<thead>
				<tr>
				<th scope="col">#id</th>
				<th scope="col">Disttname</th>
				<th scope="col">User</th>
				<th scope="col">Email.</th>
				<th scope="col">Telephone</th>
				<th scope="col">Location : Coords</th>
				<th scope="col">Account Status</th>
				<th scope="col">Operation Status</th>
				<th scope="col">Action</th>


				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM distributors  WHERE accountStatus='PENDING'";
				$result = mysqli_query($db, $sql);
				while($row = mysqli_fetch_array($result, MYSQLI_NUM))
				{	
				
					echo '<tr>';
						echo '<td>'.$row[0].'</td> '; 
						echo '<td>'.$row[1].'</td> '; 
						echo '<td>'.$row[2].'</td> '; 
						echo '<td>'.$row[3].'</td> '; 
						echo '<td>'.$row[4].'</td> ';
						echo '<td>'.$row[6]." :<br>".$row[11].", ".$row[12].'</td> ';
						echo '<td>'.$row[10].'</td> '; 
						echo '<td>'.$row[9].'</td> '; 
						echo '<td>
								<a href="approvedist.php?id='.$row[0].'"><strong><button type="button" class="btn btn-success">Approve</button>
								<a href="rejectdist.php?id='.$row[0].'"><strong><button type="button" class="btn btn-danger">Reject</button>
							</td> ';
					echo '</tr>';
				}
				?>
			</tbody>
			</table>
        </div>
    </div> 
	<br>
	<div style="padding: 6px 12px; border: 1px solid #ccc;">
	<div class="container">
    <h2>Rejected Distributor Accounts</h2> 
        <p>The following are distributor accounts pending approval</p>
        <div style="padding: 6px 12px; border: 1px solid #ccc;">
			<table class="table table-bordered">
			<thead>
				<tr>
				<th scope="col">#id</th>
				<th scope="col">Disttname</th>
				<th scope="col">User</th>
				<th scope="col">Email.</th>
				<th scope="col">Telephone</th>
				<th scope="col">Location : Coords</th>
				<th scope="col">Account Status</th>
				<th scope="col">Operation Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM distributors ";
				$result = mysqli_query($db, $sql);
				while($row = mysqli_fetch_array($result, MYSQLI_NUM))
				{	
					echo '<tr>';
						echo '<td>'.$row[0].'</td> '; 
						echo '<td>'.$row[1].'</td> '; 
						echo '<td>'.$row[2].'</td> '; 
						echo '<td>'.$row[3].'</td> '; 
						echo '<td>'.$row[4].'</td> ';
						echo '<td>'.$row[6]." :<br>".$row[11].", ".$row[12].'</td> ';
						echo '<td>'.$row[10].'</td> '; 
						echo '<td>'.$row[9].'</td> '; 
					echo '</tr>';
				}
				?>
			</tbody>
			</table>
        </div>
    </div> 
	<!-- <div> -->
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
   
