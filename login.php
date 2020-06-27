<?php 
session_start();
if(isset($_SESSION["user_email"])){header("location:pages.php?page=viewprofile");}
include("header.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//echo "her";
include_once("singlegetdata.php");
$where_q = "WHERE email = '".$_POST["players|email"]."' AND password = '".$_POST["players|password"]."'";
singletable("players",$where_q,"email, password, id");
$response = $_POST;

if(isset($_POST['error'])){
$error_mysql = '
								<div class="alert alert-danger">
							<strong>Error!</strong> Cannot Sign In. Please check the details.
							</div>
					';
}
else
{	
$_SESSION["user_id"] = $_POST["players|id"];
$_SESSION["user_email"]  = $_POST["players|email"];
header("location:pages.php?page=viewprofile");
}
}
?>

<section class="form-12" id="home">
	<div class="form-12-content">
		<div class="container">
			<div class="grid grid-column-1 ">				
				<div class="column1">
                <h2>Login to the world of Champions.</h2>				
			<br>	
<?php echo $error_mysql; ?>			
               <form method="post" id="player_profile" onsubmit="event.preventDefault(); checkauthentic();">       
<div class="form-group">
  Enter your Email Address<br>
  <input type="email" name="players|email" data-is="yes" data-comma="yes" id="player_email" class="form-control" value="<?php if(isset($_POST["players|email"])){echo $_POST['players|email']; } ?>">
  <div id="player_email_status"></div>
</div>

<div class="form-group">  
Password <br><input type="password" id="player_password" class="form-control" name="players|password" value="<?php if(isset($_POST["players|password"])){echo $_POST['players|password']; } ?>">
<div id="player_password_status"></div>
</div>
    <button type="submit" id="save_button" type="button" class="btn btn-success" value="Save Changes">Login</button>        
</form>
			</div>
				
			</div>
		</div>
	</div>
</section>

<?php 

include("footer.php");

?>
<script src="authenticate.js"></script>