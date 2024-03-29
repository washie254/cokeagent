<?php 
    include('server.php');
    //include('connect-db.php');
    if (isset($_GET['id'])){
        $tid = $_GET['id'];
    }
?>
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
<!-- tabs -->

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
				<a class="nav-link" href="index.php"><- Go Back <span class="sr-only">(current)</span></a>
			  </li>
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
    <h2>File The Report for Distributor : <b></b></h2> 
    <hr><br>
       
       <div style="padding: 6px 12px; border: 1px solid #ccc;">
        <h3>File Report</h3>

        <p>fill in the necessary fields for filing the report</p>
        <div style="padding: 6px 12px; border: 1px solid #ccc;">
        <form method="post" action="file.php">
          <?php include('errors.php'); ?>
            <?php
                $query2 = "SELECT * FROM tasks WHERE id='$tid'";
                $result2 = mysqli_query($db, $query2);
                while($row = mysqli_fetch_array($result2, MYSQLI_NUM)){
                    $tid = $row[0]; // E ID 
                    $distributor= $row[3];
                    $description = $row[4];

                }
            ?>
            <div class="form-group">
              <label for="taskinfo"><b>Task Info:</b></label>&nbsp;&nbsp;
              <label for="distributor"><b>Distributor:</b> <?=$distributor?></label>&nbsp;&nbsp;
              <label for="distributor"><b>Manager Remarks:</b> <?=$description?></label>
              <p>Collect the following details from the distributor</p>
            </div>

            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="tid" value="<?=$tid?>"  style="opacity:0.3;" readonly>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="did" value="<?=$distributor?>" style="opacity:0.3;" readonly>
                </div>
                <input type="text" id="lat" name="lat" style="opacity: 0.2;" readonly/>
                <input type="text" id="lng" name="lng" style="opacity: 0.2;" readonly/>
            </div>
            Current Levels:
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="cdasani" placeholder="Current Level of Dasani" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="csoda" placeholder="Current Level of Soda" required>
                </div>
            </div>

            Maximum Levels:
            <br>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="maxdasani" placeholder="Dasani Max usage perday" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="maxsoda" placeholder="Soda Max usage per day" required>
                </div>

            </div>
            
            Minimum Levels
            <br>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="mindasani" placeholder="Dasani min usage perday" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="minsoda" placeholder="Soda Min usage per day" required>
                </div>
            </div>

           Amount of quantities ordered
            <br>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="dasaniorq" placeholder="Dasani Quantity Normally Ordered" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="sodaorq"  placeholder="Soda Quantity Normally Ordered" required>
                </div>
            </div>

            <br>
            Remarks:
            <div class="form-row">
                <div class="col">
                    <textarea type="text" class="form-control" name="remarks" placeholder="Provide some remarks bout the distribution" required></textarea>
                </div>
            </div>


            <br><button type="submit" class="btn btn-success" name="fileinventory" ><b>File Report </b></button>

        </form>
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
   