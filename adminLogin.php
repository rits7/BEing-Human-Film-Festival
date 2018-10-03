<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
        <title>Login Control Panel | BEing Human Film Festival</title>
    
        <!--Favicon-->
        <link rel="icon" type="image/png" href="content/images/BHico.png" sizes="16x16">
        <!--Viewport-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Base href-->
        <!--<base href="http://www.beinghumanfilmfestival.com/">-->
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <!--Font Awesome-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!--CSS-->
        <link rel="stylesheet"	type="text/css"	href="css/styles.css">
    </head>
    <?php
        session_start();
        error_reporting(0);

        include "php/functions.php";
        include "php/connection.php";
        include "php/messages.php";

    ?>
    <body class="admin">
        <!--Header-->
        <nav class="navbar navbar-expand-lg navbar-toggleable-md fixed-top">
            <div class="container">
                <!--Logo-->
                <a href="index.php" class="navbar-brand my-1"><img class="logo"  src="content/images/BHFFlogo.png"/></a>
                <!--Nav Menu-->
                <div class="collapse navbar-collapse justify-content-center" id="nav-menu">
                    <ul class="navbar-nav">
                        <li class="navbar-item">
                            <a class="nav-link px-3 py-2" href="index.php">Home</a>
                        </li>
                        <li class="dropdown d-none d-lg-block d-xl-block"><!--Dropdown menu-->
                            <a class="px-3 py-2 nav-link dropdown-toggle" href="about.html" data-toggle="dropdown">About</a>
                            <div class="dropdown-menu m-0">
                                <a class="dropdown-item" href="contact.html">Contact Us</a>
                            </div>
                        </li>
                        <li class="d-lg-none d-xl-none "><!--Dropdown menu when collapsed-->
                            <a class="navbar-item px-3 nav-link" href="about.html">About</a>
                            <ul class="nav-list">
                                <li class="navbar-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                            </ul>
                        </li>
                        <li class="dropdown d-none d-lg-block d-xl-block"><!--Dropdown menu-->
                            <a class="navbar-item px-3 py-2 nav-link dropdown-toggle" href="registration.html" data-toggle="dropdown">Registration</a>
                            <div class="dropdown-menu m-0">
                                <a class="dropdown-item" href="guidelines.html">Guidelines</a>
                                <a class="dropdown-item" href="terms-and-conditions.html">Terms and Conditions</a>
                            </div>
                        </li>
                        <li class="d-lg-none d-xl-none"><!--Dropdown menu when collapsed-->
                            <a class="navbar-item px-3 nav-link" href="registration.html">Registration</a>
                            <ul class="nav-list">
                                <li class="navbar-item"><a class="nav-link" href="guidelines.html">Guidelines</a></li>
                                <li class="navbar-item"><a class="nav-link" href="terms-and-conditions.html">Terms and Conditions</a></li>
                            </ul>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link px-3 py-2" href="sponsors.html">Sponsors</a>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link px-3 py-2" href="charities.html">Charities</a>
                        </li>
                        <li class="dropdown d-none d-lg-block d-xl-block"><!--Dropdown menu-->
                            <a class="px-3 py-2 nav-link dropdown-toggle" href="2018-videos.php" data-toggle="dropdown">Videos</a>
                            <div class="dropdown-menu m-0">
                                <a class="dropdown-item" href="2017-videos.php">2017 Videos</a>
                            </div>
                        </li>
                        <li class="d-lg-none d-xl-none "><!--Dropdown menu when collapsed-->
                            <a class="navbar-item px-3 nav-link" href="2018-videos.php">Videos</a>
                            <ul class="nav-list">
                                <li class="navbar-item"><a class="nav-link" href="2017-videos.php">2017 Videos</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="social-media navbar-brand mx-auto mb-0">
                    <a href="#"><img class="icon" src="content/images/Youtube_circle_colour.png" /></a>
                    <a href="#"><img class="icon" src="content/images/Facebook_circle_colour.png" /></a>
                    <a href="#"><img class="icon" src="content/images/Instagram_circle_colour.png" /></a>
                    <a href="#"><img class="icon" src="content/images/Twitter_circle_color.png" /></a>
            <p class="hashtag d-inline d-lg-none d-xl-none mb-0">#bhff2018</p><!--For xs to md-->
                <p class="hashtag text-center d-none d-lg-block d-xl-block mb-0">#bhff2018</p><!--For lg to xl-->
                </div>
                <button class="d-lg-none d-xl-none"><i class="fa fa-bars fa-lg navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#nav-menu"></i></button><!--Font Awesome bars icon-->
            </div>
        </nav>
        <!--Page Contents-->
        <div class="container-fluid col-10 col-md-9 col-lg-8 page-contents p-4">
            <a href="adminDashboard.html"><button type="button" class="btn btn-primary mt-2 mb-4">Back</button></a>
            <h1>Login Control Panel</h1>
            <div class="error-message mt-4">
                <h5 class="text-danger">
                    <?php
                        if(isset($_SESSION['message']))
                        {
                            echo $_SESSION['message'];
                            unset ($_SESSION['message']);
                        }
                    ?>
                </h5>
            </div>
            <form class="w-75 mt-4" method="post" action="<?php echo htmlspecialchars ('php/adminLoginProcessing.php');?>">
                <div class="form-group mt-2">
                    <label for="formUsername">Username:</label>
                    <input type="text" class="form-control" id="formUsername" name="username" value="<?php if (isset($_SESSION['username'])) print $_SESSION['username'];?>" />
                </div>
                <div class="form-group mt-2">
                    <label for="formPassword">Password:</label>
                    <input type="password" class="form-control" id="formPassword" name="password" value="<?php if (isset($_SESSION['password'])) print $_SESSION['password'];?>" />
                </div>
                <div class="form-group mt-2">
                    <label for="formAdminID">Admin ID:</label>
                    <input type="text" class="form-control" id="formAdminID" name="adminID" value="<?php if (isset($_SESSION['adminID'])) print $_SESSION['adminID'];?>" />
                    <small id="imageHelp" class="form-text text-muted">ONLY USE THIS FIELD FOR "DELETE" AND "UPDATE", LEAVE EMPTY FOR "ADD"</small>
                </div>
                <div class="submit-buttons mt-4">
                    <input class="mx-2" type="Submit" name="add" value="Add">
                    <input class="mx-2" type="Submit" name="delete" value="Delete">
                    <input class="mx-2" type="Submit" name="update" value="Update">
                </div>
            </form>
            <form class="w-75 view-all mt-2" method="post" action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']);?>">
                <input class="mx-2 bg-primary text-white" type="Submit" name="viewAll" value="View All">
                <?php
                    if(isset($_POST{'viewAll'}))
                    {
                        $sql = "select * from login";
                        $result = mysqli_query ($conn, $sql);

                        print "<table border='1' class='table mt-2'>";
                        print "<h4 class='mt-2'>List of Users</h4>";
                        print "<thead>";
                        print "<tr>";
                        print "<th class='p-1'>Admin ID (Click ID to fill form)</th>";
                        print "<th class='p-1'>Username</th>";
                        print "</tr>";
                        print "</thead>";

                        while ($row = mysqli_fetch_array($result))
                        {
                            print"<tbody>";
                            print"<tr>";
                            print"<td class='p-1'><a href='php/adminLoginProcessing.php?adminID=$row[0]'>$row[0]</a></td>";
                            print"<td class='p-1'>$row[1]</td>";
                            print "</tr>";
                            print"</tbody>";
                        }
                        print "</table>";
                    }         
                ?>
            </form>
        </div>
        <!--Footer-->
        <footer id="footer">
        <div class="container-fluid">
            <div class="row">
				<div class="col-sm-2 cols">
                </div>
                <div class="col-sm-2 cols">
                    <h5><a class="footer-heading" href="index.php">BEing Human Film Festival</a></h5>
                    <ul>
                        <li><a href="about.html">About</a></li>
                        <li><a href="registration.html">Registration</a></li>
						<li><a href="guidelines.html">Guidelines</a></li>
						<li><a href="terms-and-conditions.html">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-sm-2 cols">
                    <h5><a class="footer-heading" href="2018-videos.php">Videos</a></h5>
                    <ul>
                        <li><a href="2018-videos.php">BHFF Entries 2018</a></li>
                        <li><a href="2017-videos.php">BHFF Entries 2017</a></li>
                    </ul>
                </div>
                <div class="col-sm-2 cols">
                    <h5><a class="footer-heading" href="charities.html">Charities</a></h5>
                    <ul>
                        <li><a target="_blank" href="http://www.108lives.org/">108 Lives Project</a></li>
                        <li><a target="_blank" href="https://www.facebook.com/108livesAustralia/">One Community</a></li>
                     </ul>
                </div>
				<div class="col-sm-3 cols">
                    <h5><a class="footer-heading" href="#">Sponsors</a></h5>
                    <ul>
                        <li><a target="_blank" href="http://www.jmcacademy.edu.au/">JMC Academy</a></li>
                        <li><a target="_blank" href="http://www.sydneyshortfilmschool.com/">Sydney Short Film School</a></li>
                        <li><a target="_blank" href="https://canterbury.ljhooker.com.au/">LJ Hooker Canterbury</a></li>
						<li><a target="_blank" href="https://www.greenavenue.com.au/">Green Avenue Design</a></li>
						<li><a target="_blank" href="https://www.dendy.com.au/">Dendy Cinemas</a></li>
                        <li><a target="_blank" href="https://www.palacecinemas.com.au/">Palace Cinemas</a></li>
                        <li><a target="_blank" href="#">Da Vinci Restaurant Summer Hill</a></li>
					</ul>
                </div>
				<div class="col-sm-1 cols">
                </div>
			</div>
		</div>	
		<div class="container-fluid">
            <div class="row">
                <div class="col-sm-2 cols">
                </div>
				<div class="col-sm-2 cols">
                    <ul>
                        <h5><li><a class="footer-heading" href="judges-register.html">Judges Register</a></li></h5>
                        <h5><li><a class="footer-heading" href="login.php">Admin Login</a></li></h5>
                     </ul>
					</div>
				<div class="col-sm-2 cols">
                </div>
				<div class="col-sm-2 cols">
                </div>
				<div class="col-sm-2 cols">
				<div class="social-networks">
					<a target="_blank" href="#"><img class="footer-icon" src="content/images/Youtube_circle_bw.png"></a>
					<a target="_blank" href="#"><img class="footer-icon" src="content/images/Facebook_circle_bw.png"></a>
					<a target="_blank" href="#"><img class="footer-icon" src="content/images/Instagram_circle_bw.png"></a>
					<a target="_blank" href="#"><img class="footer-icon" src="content/images/Twitter_circle_bw.png"></a>
					<p class="hashtag d-inline align-middle">#bhff2018</p>
				</div>
				</div>
				<div class="col-sm-2 cols">
                </div
                </div>
			</div>
            </div>
			<div class="copyright">
                <p class="text-center">&copy; 2018 BEing Human Film Festival</p>
                <p class="text-center creator">Created by: G.Bond, JJ.Daco and R.Sharma</p>
            </div>
    </footer>
<!--Javascript-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script>
    
    $('.dropdown').hover(function(){
        $(this).find('.dropdown-menu').stop(true, true).fadeIn(500);
        }, function() {
        $(this).find('.dropdown-menu').stop(true, true).fadeOut(500);
    });
    
    $('.dropdown .nav-link').click(function(){
        location.href = this.href;
    });
    
</script>
    </body>
</html>