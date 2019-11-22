<?php include('server.php'); ?>
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

<!-- tabs -->
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
			  <li class="nav-item"><a class="nav-link" href="visits.php">Visits</a></li>
			  <li class="nav-item"><a class="nav-link" href="reports.php">Reports</a></li>
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

<!-- ====================================MAPS -->
<script>
    if(!navigator.geolocation){
    alert('Your Browser does not support HTML5 Geo Location. Please Use Newer Version Browsers');
    }
    navigator.geolocation.getCurrentPosition(success, error);
    function success(position){
    var latitude  = position.coords.latitude;	
    var longitude = position.coords.longitude;	
    var accuracy  = position.coords.accuracy;
    document.getElementById("lat").value  = latitude;
    document.getElementById("lng").value  = longitude;
    document.getElementById("acc").value  = accuracy;
    }
    function error(err){
    alert('ERROR(' + err.code + '): ' + err.message);
    }
</script>
<!-- ====================================MAPS -->

<div class="main-wrapper ">

<section class="section intro">
  <div class="container">
    <div style="padding: 6px 12px; border: 1px solid #ccc;">
        <h3>Profile Information</h3>
        <p> your profile information is as follows</p>
        <?php

                $user = $_SESSION['username'];

                $query0 = "SELECT * FROM distributors WHERE username='$user'";
                $result0 = mysqli_query($db, $query0);
                
                while($row = mysqli_fetch_array($result0, MYSQLI_NUM)){
                    $uid=$row[0];
                    $distname=$row[1];
                    $distoname=$row[2];
                    $distemail=$row[3];
                    $distel=$row[4];
                    $distlocation=$row[5];
                    $dateadded=$row[6];
                    $timeadded=$row[7];
                    $description=$row[8];
                    $status=$row[9];
                    $accountStatus=$row[10];
                    $lat=$row[11];
                    $lng=$row[12];
                    ;
                }
            ?>
            <table class="container table-striped ">
                <thead>
                  <thead class="thead-light">
                    <tr style="background-color:rgba(10,200,10,0.5); height:50px;">
                      <th scope="col" colspan="2">SUMMARY</th>
                      <td>Account : <b><?=$accountStatus?></b></td>
                      <td>Operational Status:<b><?=$status?><b></td>
                    </tr>
                  </thead>
                    <tr>
                        <th scope="col">Avatar</th>
                        <th scope="col"><th>
                        <th scope="col">Information</th>
                    </tr>
                    <hr>
                </thead>
                <tr style="width:200px;">
                    <td style="width: 90px;"><img src="images/avatar.png" style="width:150px; height:150px;"></td>
                    <td><b>
                      <label>ID</label><br>
                      <label>Dist. Name </label><br>
                      <label>Personel Names</label><br>
                      <label>Email </label><br>
                      <label>Tel No </label><br>
              </b>
                    </td>
                    <td>
                        <label><?php echo $uid; ?></label><br>
                        <label><?php echo $distname; ?></label><br>
                        <label><?php echo $distoname; ?></label><br>
                        <label><?php echo $distemail; ?></label><br>
                        <label><?php echo $distel; ?></label><br>
                    </td>
                    <td>
                        <label><b>Location: </b>&nbsp;&nbsp;<?php echo $distlocation; ?></label><br>
                        <label><b>Signup Date: </b>&nbsp;&nbsp;<?php echo $dateadded; ?></label><br>
                        <label><b>Signup Time: </b>&nbsp;&nbsp;<?php echo $timeadded; ?></label><br>
                    </td>
                </tr>
                <tr>
                  <td colspan="4"><b> Summary info</b><br><?=$description?><td>
                <tr>
            </table>
      </div>
  </div>
  <hr><br>
	<div class="container">
    <h2>MY TASK REPORTS</h2> 
    <!-- Tab links -->
    <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'UpdateProfile')">Update Profile</button>
    <!-- <button class="tablinks" onclick="openCity(event, 'Completed')">Completed Tasks</button>
    <button class="tablinks" onclick="openCity(event, 'Remarks')">Task Remarks</button> -->
    </div>

    <!-- Tab content -->
    <div id="UpdateProfile" class="tabcontent">
      <h3>Update Profile</h3>
      <p>Fill in the following details</p>
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
        <?php 
          $resultz = mysqli_query($db,"SELECT * FROM distributors WHERE id='$uid'");
          $rowz= mysqli_fetch_array($resultz);
        ?>
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
  
    </div>
    
	</div>
</section>

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
   