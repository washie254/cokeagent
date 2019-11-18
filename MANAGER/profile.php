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
        <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tasks</a>
					<ul class="dropdown-menu" aria-labelledby="dropdown03">
						<li><a class="dropdown-item" href="allocatetasks.php">Allocate</a></li>
						<li><a class="dropdown-item" href="allocated.php">Allocated Tasks</a></li>
					</ul>
			  </li>
        <li class="nav-item"><a class="nav-link" href="agents.php">Agents</a></li>
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
    <div style="padding: 6px 12px; border: 1px solid #ccc;">
        <h3>Manager Profile</h3>
        <p> your profile information is as follows</p>
        <?php
                $user = $_SESSION['username'];

                $query0 = "SELECT * FROM managers WHERE username='$user'";
                $result0 = mysqli_query($db, $query0);
                
                while($row = mysqli_fetch_array($result0, MYSQLI_NUM)){
                    $uid=$row[0];
                    $uname=$row[1];
                    $oname=$row[2]." ".$row[3];
                    $umail=$row[4];//mail
                    $utel=$row[5];//tel
                    $status=$row[7];
                    $dateadded=$row[8];
                    $deactdate=$row[11];
                    $deactreason=$row[10];
                    $reactreason = $row[12];
                    $reactdate = $row[13];
                }
            ?>
            <table class="container">
                <thead>
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
                      <label>Username </label><br>
                      <label>Other Names</label><br>
                      <label>Email </label><br>
                      <label>Tel No </label><br>
                      </b>
                    </td>
                    <td>
                        <label><?php echo $uid; ?></label><br>
                        <label><?php echo $uname; ?></label><br>
                        <label><?php echo $oname; ?></label><br>
                        <label><?php echo $umail; ?></label><br>
                        <label><?php echo $utel; ?></label><br>
                    </td>
                    <td>
                        <label><b>Signup Date: </b>&nbsp;&nbsp;<?php echo $dateadded; ?></label><br>
                        <label><b>Account Stat: </b>&nbsp;&nbsp;<?php echo $status; ?></label><br>
                    </td>
                </tr>
                <tr>
                  <?php 
                    if($status !='ACTIVE'){
                      echo "<td><label><b>Deactivation Date: </b>&nbsp;&nbsp $deactdate </label><br>
                             <b>Deactivation Reason: </b>&nbsp;&nbsp; $deactreason <br></td>";
                    }
                    if($reactdate > 0){
                      echo "<td><label><b>Reactivation Date: </b>&nbsp;&nbsp $reactdate </label><br>
                            <b> Reason: </b>&nbsp;&nbsp; $reactreason <br></td>";
                    }
                  ?>
                </tr>
            </table>
      </div>
  </div>
  <hr><br>
	<div class="container">
    <h2>Update Profile</h2> 
    <!-- Tab links -->
    <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Pendingtasks')">Update Profile</button>
    <!-- <button class="tablinks" onclick="openCity(event, 'Completed')">Completed Tasks</button>
    <button class="tablinks" onclick="openCity(event, 'Remarks')">Task Remarks</button> -->
    </div>

    <!-- Tab content -->
    <div id="Pendingtasks" class="tabcontent">
      <h3>Pending Tasks</h3>
      <p>the following are the tasks you are yet to complete.</p>
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
        $resultz = mysqli_query($db,"SELECT * FROM managers WHERE id='$uid'");
        $rowz= mysqli_fetch_array($resultz);
      ?>
      <form class="form" action="profile.php" method="post">
        <div class="form-group">
            <div class="col-xs-6">
                <label for="first_name"><h4>First name</h4></label>
                <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $rowz['fname']; ?>">
            </div>
        </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="last_name"><h4>Last name</h4></label>
                    <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $rowz['lname']; ?>">
                </div>
            </div>
      
            <div class="form-group">	
                <div class="col-xs-6">
                    <label for="phone"><h4>Phone</h4></label>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $rowz['tel']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="email"><h4>Email</h4></label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $rowz['email']; ?>">
                </div>
            </div>



            <div class="form-group">
                <input type="text" name="mid" value="<?=$uid?>" style="opacity: 0;" />
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <br>
                    <button class="btn btn-lg btn-success" type="submit" name="update_info"><i class="glyphicon glyphicon-ok-sign"></i> UPDATE MANAGER PROFILE</button>
                </div>
            </div>
        </form>

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
   