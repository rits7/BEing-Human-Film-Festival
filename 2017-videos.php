<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>2017 Videos | BEing Human Film Festival</title>
    
    <!--Favicon-->
    <link rel="icon" type="image/png" href="content/images/BHico.png" sizes="16x16">
    <!--Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Meta Data-->
    <meta name="keywords" content="bhff, 2017, BEing Human Film Festival, film festival, short films, film making, inner-west sydney, school project, sydney, australia, high school students, education, youth, being human, video, submissions, entries, share ideas, community, compassion, understanding, tolerance, documentary, drama, comedy, sci-fi, no dialogue, Canterbury Girls High School, Canterbury Boys High School, Ashfield Boys High School, Dulwich High">
    <meta name="description" content="The BEing Human Film Festival's video submissions from Inner-West Sydney High-school students for 2017.">
    <!--Open Graph Data-->
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.beinghumanfilmfestival.com/2017-videos/">
    <meta property="og:title" content="2017 Videos | BEing Human Film Festival">
    <meta property="og:image" content="content/images/BHFFog.jpg">
    <meta property="og:description" content="The BEing Human Film Festival's video submissions from Inner-West Sydney High-school students for 2017.">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Roboto" rel="stylesheet">
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
    
//Get data from DB
    
include_once ('php/connection.php');

$sql = "select * from videos where VideoYear = 2017";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

$slides='';
$indicators='';
$counter=0;
$videoTitle = '';
$videoCreator = '';
$videoSchool = '';
$videoCountry = '';
$videoLink = '';
$videoImage = '';


while($row=mysqli_fetch_array($result))
{
    $videoTitle = $row['VideoTitle'];
    $videoCreator = $row['VideoCreator'];
    $videoSchool = $row['VideoSchool'];
    $videoCountry = $row['VideoCountry'];
    $videoLink = $row['VideoLink'];
    $videoImage = $row['VideoImage'];
    $videoInfo ='';
    
    if ($counter == 0)
    {
        $indicators .='<li data-target="#video-carousel" data-slide-to="'.$counter.'" class="active"></li>';
        $videoInfo = $videoTitle."|".$videoCreator."|".$videoSchool."|".$videoCountry;
        $slides .= 
        '
        <div class="carousel-item col-md-4 p-4 active" id="'.$videoInfo.'">
            <a href="'.$videoLink.'" target="youtube-player"
            onclick="getInfo(\''.$videoInfo.'\');"  >
                <img class="img-fluid mx-auto d-block" src="content/images/videoImages/'.$videoImage.'" />
            </a>
            <div class="carousel-caption">
                <p class="carousel-title">'.$videoTitle.'</p>  
            </div>
        </div>';
    }
    else
    {
        $indicators .='<li data-target="#video-carousel" data-slide-to="'.$counter.'"></li>';
        $videoInfo = $videoTitle."|".$videoCreator."|".$videoSchool."|".$videoCountry;
        $slides .= 
        '<div class="carousel-item col-md-4 p-4" id="'.$videoInfo.'">
            <a href="'.$videoLink.'" target="youtube-player" onclick="getInfo(\''.$videoInfo.'\');"   >
                <img class="img-fluid mx-auto d-block" src="content/images/videoImages/'.$videoImage.'" />
            </a>
            <div class="carousel-caption">
                <p class="carousel-title">'.$videoTitle.'</p>
            </div>
        </div>';
    }
    $counter++;
}

?>
    
<body class="videos">
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
            	<a target="_blank" href="https://www.youtube.com/channel/UCyB2dBvrMTHzn6MvhH_cceg/featured"><img class="icon" src="content/images/Youtube_circle_colour.png" /></a>
                <a target="_blank" href="https://www.facebook.com/Being-Human-Film-Festival-719578074898975/"><img class="icon" src="content/images/Facebook_circle_colour.png" /></a>
                <a href="#"><img class="icon" src="content/images/Instagram_circle_colour.png" /></a>
                <a href="#"><img class="icon" src="content/images/Twitter_circle_color.png" /></a>
		<p class="hashtag d-inline d-lg-none d-xl-none mb-0">#bhff2018</p><!--For xs to md-->
          	<p class="hashtag text-center d-none d-lg-block d-xl-block mb-0">#bhff2018</p><!--For lg to xl-->
            </div>
            <button class="d-lg-none d-xl-none"><i class="fa fa-bars fa-lg navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#nav-menu"></i></button><!--Font Awesome bars icon-->
        </div>
    </nav>
    <!--Page Contents-->
    <div class="container-fluid col-10 col-lg-8 page-contents">
        <div class="top-buttons">
            <a href="2018-videos.php" class="pagebuttons">Back to Videos</a>
        </div>
        <div class="row">
            <div class="col-12"><!-- Heading column -->
                <div class="title-wrap">
                    <h1 class="content-title mb-0">2017 Videos</h1>
                    <img src="content/images/dashedborder-rego%20v2.svg" class="slideRight dash-vid" alt="dashed underline" height="10" width="110">
                </div>
            </div>
        </div><!-- main row -->
        
        <div class="row video-player mx-1 my-4">
            <div class="embed-responsive embed-responsive-16by9 col-12 col-md-8 mb-4 mb-md-0">
                <!--FEATURED VIDEO-->
                <iframe name="youtube-player" class="embed-responsive-item" src="https://www.youtube.com/embed/" frameborder="0" allowfullscreen></iframe>
            </div>
            <!--FEATURED VIDEO DETAILS-->
            <div class="video-info col-12 col-md-4 mt-3">
                <p class="videoTitle" id="videoTitle"></p>
                <p class="videoCreator" id="videoCreator"></p>
                <p class="videoSchool" id="videoSchool"></p>
                <p class="videoCountry" id="videoCountry"></p>
            </div>
        </div>
        <!--Carousel-->
        <div id="video-carousel" class="row mx-1 carousel slide" data-interval="3500" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <?php echo $slides; ?>
            </div>
            <a class="carousel-control-prev" href="#video-carousel" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#video-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
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
					<a target="_blank" href="https://www.youtube.com/channel/UCyB2dBvrMTHzn6MvhH_cceg/featured"><img class="footer-icon" src="content/images/Youtube_circle_bw.png"></a>
					<a target="_blank" href="https://www.facebook.com/Being-Human-Film-Festival-719578074898975/"><img class="footer-icon" src="content/images/Facebook_circle_bw.png"></a>
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
<script>
    //Carousel
    
    $('#video-carousel').on('slide.bs.carousel', function (e) {

    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $('.carousel-item').length;
    
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});
    
    $('.carousel-caption').hide();
    
    $('.carousel-item, .carousel-control-next, .carousel-control-prev').hover(function(){
        $('.carousel-caption').stop(true, true).fadeIn(500);
        }, function() {
        $('.carousel-caption').stop(true, true).fadeOut(500);
    });
</script>
<script>
    //Video-info
    
    function getInfo(videoInfo)
    {
        var infoField = videoInfo.split("|");
        
        var videoTitle = infoField[0];
        var videoCreator = infoField[1];
        var videoSchool = infoField[2];
        var videoCountry = infoField[3];
        
        document.getElementById("videoTitle").textContent = videoTitle;
        document.getElementById("videoCreator").textContent= videoCreator;
        document.getElementById("videoSchool").textContent = videoSchool;
        document.getElementById("videoCountry").textContent = videoCountry;
    }
    
</script>

</body>
</html>
