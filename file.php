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

        <form method="post" action="file.php">
          <?php include('errors.php'); ?>
          <?php
            $query2 = "SELECT * FROM tasks WHERE id='$tid'";
            $result2 = mysqli_query($db, $query2);
            while($row = mysqli_fetch_array($result2, MYSQLI_NUM)){
                $tid = $row[0]; // E ID 
                $distributor= $row[2];
                $category = $row[3]; 
                $description = $row[4];

            }
        ?>
          <div class="form-group">
              <label for="taskinfo"><b>Task Info:</b></label><br>
              <label for="other"><b>Task ID:</b> <?=$tid?> || <b>Category: </b><?=$category?> </label><br>
              <label for="distributor"><b>Distributor:</b> <?=$distributor?></label>
          </div>

          <div class="form-group">
              <label for="taskDescription">Task Description</label>
              <textarea type="text" class="form-control" name="fname" placeholder="<?=$description?>" disabled></textarea>
          </div>

          <?Php
            if($category =='Soda'){
                ?>
                    <div class="form-group">
                        <label for="cratesinsystems">Crates in System</label>
                        <input type="number" class="form-control" name="syscrates" placeholder="45" disabled>
                    </div>

                    <div class="form-group">
                        <label for="crates">Current Crates</label>
                        <input type="number" class="form-control" name="curcrates" placeholder="Current Number of Crates">
                    </div>

                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea type="text" class="form-control" name="remarks" placeholder="Give Remarks of the Distributor"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success" name="filesoda" style="width:100%;"><b>File Report </b></button>

                <?php
            }
            elseif($category =='Dasani'){
                ?>
                    <div class="form-group">
                        <label for="cratesinsystems">Crates in System</label>
                        <input type="number" class="form-control" name="syscrates" placeholder="45" disabled>
                    </div>

                    <div class="form-group">
                        <label for="crates">Current Crates</label>
                        <input type="number" class="form-control" name="curcrates" placeholder="Current Number of Dasani Crates">
                    </div>

                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea type="text" class="form-control" name="remarks" placeholder="Give Remarks of the Distributor"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success" name="filedasani" style="width:100%;"><b>File Report </b></button>

                <?php
            }
            elseif($category =='Merchandise'){
                ?>
                    <div class="form-group">
                        <label for="crates">Marchandise Category</label>
                        <select type="number" class="form-control" name="category">
                            <option value="Fridge">Fridge</option>
                            <option value="T-Shirts">T-Shirts</option>
                            <option value="Keyholders">Keyholders</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="crates">Number of machandise Handed</label>
                        <input type="number" class="form-control" name="machno" placeholder="Marchanise Handed">
                    </div>

                    <div class="form-group">
                        <label for="crates">Remarks</label>
                        <textarea type="text" class="form-control" name="remarks" placeholder="Remarks on the Distributor"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success" name="filesoda" style="width:100%;"><b>File Marchandise </b></button>

                <?php
            }
            else{
                ?>
                    <h2>Couldn't Identisy The category of the Task !</h2>
                <?php
            }

          ?>

        </form>
      </div>
	</div>
</section>

<!-- Section Intro END -->
<!-- Section About Start -->


<!-- Section About End -->

<!--  Section Services Start -->

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
   