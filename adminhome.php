<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <script>
function myFunction() {
    var x = document.getElementById("bs-example-navbar-collapse-1");
    if (x.className === "collapse navbar-collapse") {
        x.className += " responsive";
    } else {
        x.className = "collapse navbar-collapse";
    }
}
</script>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['mail']))
{
  header('location:login.php?msg=unauthorized');
}
else{
$show_mail=$_SESSION['mail'];
$user_id=$_SESSION['user_id'];
if(isset($show_mail)){
$userin= "welcome " .$show_mail;
//echo $userin;
//echo $user_id;
}
else {
  echo "problem in session";
}
}
?>
<nav class="navbar navbar-default" style="margin-bottom:0px;">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Innoraft News Feeds</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="adminhome.php">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="adminnews.php">News</a></li>
        <li><a href="#">Contacts Us</a></li>
      </ul>
     <ul class="nav navbar-nav" style="float:right;">
     	<li><a href="#"><?php echo $userin;?></a></li>
     	<li><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  </div>
</nav>
<div class="banner" style="width:100%;background:url('img/2.jpg');height:450px;background-size:cover;background-position:center;">
</div>
<div class="about" style="width:100%;">
  <div>
    <p><center><h2 style="color:blue;">About Us</h2></center></p><br>
    <br>
  <div>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h3>WELCOME TO TECH NEWS GOOGLE</h3>
        <p>Technews is the technology destination of the globe's most-read website. We cover everything and anything technology news, views, reviews, launches, trends and much more.
        With our roots in the country biggest media powerhouse, news is one of our biggest strengths. You can read about all that happens just anywhere in the world of technology, including gadgets and gizmos, on tech news.
        We at Gadgets Now love everything that has a digital pulse.Gadgets Now is also the go-to destination for gadget reviews. Here you will find in-depth reviews of smartphones, cameras, TVs, speakers, laptops, smartwatches, tablets, fitness bands, power banks and more.
      </p>
    </div>
    <div class="col-md-4">
      <img src="img/3.jpg" class="img-responsive">
    </div>
  </div>
</div>
<footer class="footer-distributed">

			<div class="footer-left">

				<h3>Company<span>logo</span></h3>

				<p class="footer-links">
					<a href="#">Home</a>
					<a href="#">News</a>
					<a href="#">Contact Us</a>
				</p>

				<p class="footer-company-name">Tech News &copy; 2017</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>21 Revolution Street</span> Paris, France</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+1 555 123456</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">support@company.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
					Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
				</p>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>
				</div>
			</div>

		</footer>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-2.1.1.js"></script>
</body>
</html>
