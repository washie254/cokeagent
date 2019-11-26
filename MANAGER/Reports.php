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


<?php
 
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=dkut_coke;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle = $link->prepare('select distributor, stocklevel from inventory'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
		
    foreach($result as $row){
        array_push($dataPoints, array("x"=> $row->distributor, "y"=> $row->stocklevel));
    }
	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
	
?>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "PHP Column Chart from Database"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc  
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
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
    <h2>General Reports</h2> 
    <!-- Tab links -->
    <div class="tab">
    <a href="#agents"><button class="btn btn-success">Agents</button></a>
    <a href="#distributors"><button class="btn btn-primary">Distributors</button></a>
    <a href="#inventory"><button class="btn btn-secondary">Inventory Levels</button></a>
    </div>

    <!-- Tab content -->
    <div id="agents" class="tabcontent">
    <h3>General Agent Reports</h3>
    <p>The following are the general Agents Reports </p>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID </th>
          <th scope="col">Usrname : Other names</th>
          <th scope="col">Telephone No</th>
          <th scope="col">Email</th>
          <th scope="col">Date Added</th>
          <th scope="col">Current Status</th>
          
        </tr>
      </thead>
      <tbody>
        <!-- [ LOOP THE REGISTERED AGENTS ] -->
        <?php
          
          $sql = "SELECT * FROM agents";
          $result = mysqli_query($db, $sql);
          while($row = mysqli_fetch_array($result, MYSQLI_NUM))
          {	
          
              echo '<tr>';
                  echo '<td>'.$row[0].'</td> '; 
                  echo '<td>'.$row[1]." :<br>".$row[3]." ".$row[4].'</td> '; 
                  echo '<td>'.$row[6].'</td> '; 
                  echo '<td>'.$row[5].'</td> '; 
                  echo '<td>'.$row[8].'</td> '; 
                  echo '<td>'.$row[10].'</td> ';
              echo '</tr>';
          }
        ?>
      </tbody>
    </table>
    

    </div>
    <br>
    <div id="distributors" class="tabcontent">
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
    <br>
    <div id="inventory" class="tabcontent">
        <h3>Distributors Inventost Level Summary</h3>
        <p>The Following Shows Distributor inventory levels</p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#Dist id</th>
              <th scope="col">D. max</th>
              <th scope="col">D. min</th>
              <th scope="col">S. max.</th>
              <th scope="col">S. min</th>
              <th scope="col">D. RQ</th>
              <th scope="col">S. RQ</th>
              <th scope="col">D. Cur </th>
              <th scope="col">S. Cur </th>
              <th scope="col">TotaL Stock</th>
              <th scope="col">Date recorded</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM inventory";
              $result = mysqli_query($db, $sql);
              while($row = mysqli_fetch_array($result, MYSQLI_NUM))
              {	
              
                  echo '<tr>';
                      echo '<td>'.$row[1].'</td> '; 
                      echo '<td>'.$row[2].'</td> '; 
                      echo '<td>'.$row[7].'</td> '; 
                      echo '<td>'.$row[3].'</td> '; 
                      echo '<td>'.$row[6].'</td> ';
                      echo '<td>'.$row[4].'</td> ';
                      echo '<td>'.$row[5].'</td> '; 
                      echo '<td>'.$row[8].'</td>'; 
                      echo '<td>'.$row[9].'</td> '; 
                      echo '<td>'.$row[10].'</td> ';
                      echo '<td>'.$row[11].'</td> ';
                  echo '</tr>';
              }
            ?>
          </tbody>
        </table>
        <br>
        Cart Section
        
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


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
   