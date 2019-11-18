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
				<a class="nav-link" href="admin_index.php">Home <span class="sr-only">(current)</span></a>
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
    <h2>THE DISTRIBUTOR DASH BOARD</h2> 
    <!-- Tab links -->
    <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Activedistributors')">Active  Distributors</button>
    <button class="tablinks" onclick="openCity(event, 'Addagents')">InnactiveDistributors</button>
    <button class="tablinks" onclick="openCity(event, 'Departments')">Departments</button>
    </div>

    <!-- Tab content -->
    <div id="Activedistributors" class="tabcontent">
    <h3>Registered Distributors</h3>
    <p>The following are the active distrbutors </p>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">ID </th>
          <th scope="col">Date Added</th>
          <th scope="col">Distributor Name</th>
          <th scope="col">Personell names</th>
          <th scope="col">Distributor Email</th>
          <th scope="col">Telephone No</th>
          <th scope="col">Location</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <!-- [ LOOP THE REGISTERED AGENTS ] -->
        <?php
          
          $sql = "SELECT * FROM distributors WHERE status='ACTIVE'";
          $result = mysqli_query($db, $sql);
          while($row = mysqli_fetch_array($result, MYSQLI_NUM))
          {	
          
              echo '<tr>';
                  echo '<td>'.$row[0].'</td> '; //DISTRIBUTOR ID
                  echo '<td>'.$row[6].'</td> '; //DATE ADDED
                  echo '<td>'.$row[1].'</td> '; //DISTRIBUTOR NAME
                  echo '<td>'.$row[2].'</td> '; //OWNER NAMES
                  echo '<td>'.$row[3].'</td> '; //DISTRIBUTOR EMAIL
                  echo '<td>'.$row[4].'</td> '; //TELEPHONE NUMBER
                  echo '<td>'.$row[5].'</td> '; //LOCATION
                  echo '<td><a href="deactivate_distributor.php?id=' . $row[0] . '"><button class="btn btn-danger">DEACTIVATE</button></a> </td>';
              echo '</tr>';
          }
        ?>
      </tbody>
    </table>
    

    </div>

    <div id="Addagents" class="tabcontent">
    <h3>In-aactive distributors</h3>
    <p>the following is information about inactive distributors in the system</p>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">ID </th>
          <th scope="col">Date Added</th>
          <th scope="col">Distributor Name</th>
          <th scope="col">Personell names</th>
          <th scope="col">Distributor Email</th>
          <th scope="col">Telephone No</th>
          <th scope="col">Location</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <!-- [ LOOP THE REGISTERED AGENTS ] -->
        <?php
          

          $sql = "SELECT * FROM distributors WHERE status='INNACTIVE'";
          $result = mysqli_query($db, $sql);
          while($row = mysqli_fetch_array($result, MYSQLI_NUM))
          {	
          
              echo '<tr>';
                  echo '<td>'.$row[0].'</td> '; //DISTRIBUTOR ID
                  echo '<td>'.$row[6].'</td> '; //DATE ADDED
                  echo '<td>'.$row[1].'</td> '; //DISTRIBUTOR NAME
                  echo '<td>'.$row[2].'</td> '; //OWNER NAMES
                  echo '<td>'.$row[3].'</td> '; //DISTRIBUTOR EMAIL
                  echo '<td>'.$row[4].'</td> '; //TELEPHONE NUMBER
                  echo '<td>'.$row[5].'</td> '; //LOCATION
                  echo '<td><a href="activate_distributor.php?id=' . $row[0] . '"><button class="btn btn-success">ACTIVATE</button></a> </td>';
              echo '</tr>';
          }
        ?>
      </tbody>
    </table>

    </div>

    <div id="Departments" class="tabcontent">
        <h3>Departments</h3>
        <p>The departmental information</p>
        <div style="padding: 6px 12px; border: 1px solid #ccc;">
            <p>Current Departments</p>
            <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">ID </th>
                <th scope="col">Department Name</th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
        
                </tr>
            </thead>
            <tbody>
                <!-- [ LOOP THE REGISTERED AGENTS ] -->
                <?php
                

                $sql = "SELECT * FROM departments";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result, MYSQLI_NUM))
                {	
                    echo '<tr>';
                        echo '<td>'.$row[0].'</td> '; //DEP ID
                        echo '<td>'.$row[1].'</td> '; //dEPTNAME
                        echo '<td>'.$row[2].'</td> '; //DATE CREATED
                        echo '<td><a href="del_department.php?id=' . $row[0] . '"><button class="btn btn-danger">DELETE</button></a> </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
            </table>
        </div> 
        <p>Add a new Department</p>
        <div style="padding: 6px 12px; border: 1px solid #ccc;">
            <form method="post" action="admin_distributors.php">
                <?php include('errors.php'); ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Department Name</label>
                    <input type="text" class="form-control" name="deptname" placeholder="Enter Department name">
                </div>
                <button type="submit" class="btn btn-success" name="add_department" style="width:100%;"><b>ADD DEPARTMERNT</b></button>

            </form>
        </div>

    </div> 
    <hr><br>
       
       <div style="padding: 6px 12px; border: 1px solid #ccc;">
        <h3>Add a New Distributor</h3>
        <p>fill in the following details to add a new destributor to the system</p>
        <form method="post" action="admin_distributors.php">
          <?php include('errors.php'); ?>
          <div class="form-group">
              <label for="exampleInputEmail1">Distributor Name</label>
              <input type="text" class="form-control" name="dname" placeholder="Enter Distributor name">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Owner names</label>
              <input type="text" class="form-control" name="oname" placeholder="Enter owners names">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="demail" placeholder="Enter email of the sitributor">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Telephone</label>
              <input type="number" class="form-control" name="dtel" placeholder="Enter Telephone">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Location</label>
              <input type="text" class="form-control" name="dlocation" placeholder="Enter Location of the distributor">
          </div>
          <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea type="text" class="form-control" name="ddescription" rows="4" cols="50"placeholder="Enter brief description about the distributor" ></textarea>
          </div>
          <button type="submit" class="btn btn-success" name="add_distributor" style="width:100%;"><b>ADD DISTRIBUTTOR</b></button>
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
   