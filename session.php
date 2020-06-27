<?php 

session_start();

if(isset($_SESSION["user_email"])){	
$user_email = $_SESSION["user_email"];
$user_id = $_SESSION["user_id"];
}
else
{
		echo "<script>window.location.replace('login.php')</script>";	
				
	//header("location:login.php");
}

?>