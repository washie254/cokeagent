<?php 
	session_start(); 

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
    <title>Bizcon</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-xl-8">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin_agents.php">Agents</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin_distributors.php">Distributors</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Page
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Project</a>
                                        <a class="dropdown-item" href="#">Project Details</a>
                                        <a class="dropdown-item" href="#">Services</a>
                                        <a class="dropdown-item" href="#">Elements</a>
                                    </div>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                                <li>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                                </li>
                                <li style="float:right;">
                                <?php  if (isset($_SESSION['username'])) : ?>
                                   <?php echo $_SESSION['username']; ?></strong>
                                    <a href="index.php?logout='1'" style="color: red;">logout</a>
                                <?php endif ?>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Coca Cola <br> Agents & Distributor <br> Management System.</h1>
                            <p>The coca cola Agents and Distributor management system.</p>
                            <a href="#" class="btn_1">learn more </a>
                            <a href="https://www.youtube.com/watch?v=pBFQdxA-apI" class="popup-youtube video_popup">
                                <span><img src="img/icon/play.svg" alt=""></span> Intro Video</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-app-1 custom-animation"><img src="img/animate_icon/icon_1.png" alt=""></div>
        <div class="hero-app-2 custom-animation2"><img src="img/animate_icon/icon_2.png" alt=""></div>
        <div class="hero-app-5 custom-animation4"><img src="img/animate_icon/icon_5.png" alt=""></div>
        <div class="hero-app-7 custom-animation2"><img src="img/animate_icon/icon_7.png" alt=""></div>
        <div class="hero-app-8 custom-animation"><img src="img/animate_icon/icon_8.png" alt=""></div>
    </section>
    <!-- banner part start-->

    <!-- about part start-->
    <section class="about_part">
        <div class="container">
            <div class="row align-items-center justify-content-end">
                <div class="col-md-6 col-lg-6 col-xl-5">
                    <div class="about_img">
                        <img src="img/about_img_1.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 offset-xl-1 col-xl-6">
                    <div class="about_text">
                        <h2>We Have 24 Year
                            Expereince in consulting</h2>
                        <h4>First Abundantly night you are sea great fifth year</h4>
                        <p>Lights fly above bearing brought abundantly whose. Without one may i seed void wels great
                            face god were deep be first. Unto for third be in moveth. Bring land bearing un abundantly
                            firmament appear whales them years. Lights fly above bearing brought bold abundantly whose
                            without one may i seed. </p>
                        <a href="#" class="btn_2">read more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-app-7 custom-animation"><img src="img/animate_icon/icon_1.png" alt=""></div>
        <div class="hero-app-8 custom-animation2"><img src="img/animate_icon/icon_2.png" alt=""></div>
        <div class="hero-app-6 custom-animation3"><img src="img/animate_icon/icon_3.png" alt=""></div>
    </section>
    <!-- about part start-->

    <!-- our_service_part part start-->
    <section class="about_part our_service_part padding_top">
        <div class="container">
            <div class="row align-items-center justify-content-end">
                <div class="col-md-6 col-xl-5">
                    <div class="about_img">
                        <img src="img/about_img_2.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 offset-xl-1 col-xl-6">
                    <div class="about_text">
                        <h2>We Providing high quality
                            	adviser service</h2>
                        <h4>First Abundantly night you are sea great fifth year</h4>
                        <p>Lights fly above bearing brought abundantly whose. Without one may i seed void wels great
                            face god were deep be first. Unto for third be in moveth. Bring land bearing un abundantly
                            firmament appear whales them years. Lights fly above bearing brought bold abundantly whose
                            without one may i seed. </p>
                        <a href="#" class="btn_2">read more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-app-1 custom-animation"><img src="img/animate_icon/icon_1.png" alt=""></div>
        <div class="hero-app-4 custom-animation2"><img src="img/animate_icon/icon_8.png" alt=""></div>
        <div class="hero-app-8 custom-animation3"><img src="img/animate_icon/icon_9.png" alt=""></div>
    </section>
    <!--::blog_part start::-->


    <!--::blog_part start::-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section_tittle text-center">
                        <h2>Update From Blog</h2>
                        <p>Coca cola company makes new deals with Nyewasco </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xl-4 d-none d-sm-block d-lg-none">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="img/blog/blog_3.png" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="blog.html">Coke</a> | <span> Nyeri, 2019 </span>
                                <a href="blog.html">
                                    <h5 class="card-title">Cocacola Company gets new partnership </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="img/blog/blog_1.png" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="blog.html">Technology</a> | <span> March 30, 2019</span>
                                <a href="blog.html">
                                    <h5 class="card-title">Cocacola Company gets new partnership </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="img/blog/blog_2.png" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="blog.html">Technology</a> | <span> March 30, 2019</span>
                                <a href="blog.html">
                                    <h5 class="card-title">New Sponsorship program</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="img/blog/blog_3.png" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="blog.html">Technology</a> | <span> March 30, 2019</span>
                                <a href="blog.html">
                                    <h5 class="card-title">coca cola company to accept kimathi university studends for attachment </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->

    <!-- footer part start-->
    <section class="footer-area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Top Products</h4>
                    <ul>
                        <li><a href="#">CocaCola Website</a></li>
                        <li><a href="#">Manage Reputation</a></li>
                        <li><a href="#">Power Tools</a></li>
                        <li><a href="#">Marketing Service</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Sponsorships</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Features</h4>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Guides</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Experts</a></li>
                        <li><a href="#">Agencies</a></li>
                    </ul>
                </div>
                <div class="col-xl-4 col-sm-8 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Newsletter</h4>
                    <p>You can trust us. we only send promo offers,</p>
                    <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank"
                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                            method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                required="" type="email">
                            <button class="click-btn btn btn-default text-uppercase btn_2">subscribe</button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="copyright_part">
        <div class="container">
            <div class="row align-items-center">
                <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | awesome Work<i class="ti-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Freddie</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"> <i class="ti-twitter"></i> </a>
                    <a href="#"><i class="ti-instagram"></i></a>
                    <a href="#"><i class="ti-skype"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- swiper js -->
    <script src="js/slick.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>


    
</body>

</html>