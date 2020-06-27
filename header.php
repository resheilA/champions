<?php include("config.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Champion.in</title>
      <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo C_ASSET_PATH; ?>assets/css/style-starter.css">
	
  </head>
  <body>


<!-- Top Menu 1 -->
<section class="w3l-top-menu-1">
	<div class="top-hd">
		<div class="container">
	<header class="row">
		<div class="social-top col-lg-3 col-6">
			<li>Follow Us</li>
			<li><a href="#"><span class="fa fa-facebook"></span></a></li>
			<li><a href="#"><span class="fa fa-instagram"></span></a> </li>
				<li><a href="#"><span class="fa fa-twitter"></span></a></li>
				<li><a href="#"><span class="fa fa-vimeo"></span></a> </li>				
		</div>
		<div class="accounts col-lg-9 col-6">				
		<?php 
		if(!isset($_SESSION["user_id"]))
		{
			echo '	<li class="top_li"><a href="pages.php?page=login">Login</a></li>
				<li class="top_li"><a href="pages.php?page=signup">Register</a></li>
				';
		}
		?>		
		</div>
		
	</header>
</div>
</div>
</section>
<!-- //Top Menu 1 -->
<section class="w3l-bootstrap-header">
  <nav class="navbar navbar-expand-lg navbar-light py-lg-2 py-2">
    <div class="container">
    <a class="navbar-brand" href="index.html"><span class="fa fa-trophy" style="color:#D4AF37;"></span> Champion</a>
      <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon fa fa-bars"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages.php?page=aboutus">About</a>
             <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Events
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="pages.php?page=listevents">Search Events</a>
        <a class="dropdown-item" href="pages.php?page=listevents">Events Registered</a>        
		<a class="dropdown-item" href="pages.php?page=listevents">Edit/Remove Events</a>        
      </div>
    </li>
	    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Clubs/Trufs/Grounds
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="pages.php?page=viewgrounds">Search for Ground</a>
        <a class="dropdown-item" href="pages.php?page=viewgrounds">Your Grounds</a>        		
      </div>
    </li>
	<?php 
	if(isset($_SESSION["user_id"]))
		{
		echo '	
	 <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       Profile
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="pages.php?page=viewprofile">View Your Profile</a>
        <a class="dropdown-item" href="logout.php">Logout</a>   
      </div>
    </li>
	';
		}
	?>	
		<li class="nav-item">
            <a class="nav-link" href="pages.php?page=services">Services</a>
          </li>
        </ul>
       
      </div>
    </div>
  </nav>
</section>

<?php 
if(isset($result['titlebar']))
if($result['titlebar'] == "yes"){
	echo '
<section class="w3l-about-breadcrum">
  <div class="breadcrum-bg py-sm-5 py-4">
    <div class="container py-lg-3">
      
      <h2><i class="fa fa-fire"></i>'.$result["title"].'</h2>
      <p>'.$result["sub_title"].'</p>
   
    </div>
  </div>
</section>
';
}
else
{
	echo '<hr>';
}
?>