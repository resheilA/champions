<?php 

include("header.php");
include_once("savedata.php");
?>

<section class="form-12" id="home">
	<div class="form-12-content">
		<div class="container">
			<div class="grid grid-column-1 ">				
				<div class="column1">
                <h2>Register to get access to exclusive sports content, events and people.</h2>				
			<br>	
<?php echo $error_mysql; ?>			
               <form method="post" id="player_profile" onsubmit="event.preventDefault(); checkauthentic();">   
<div class="form-group">
  Name<br>
  <input type="text" name="players|name" data-is="yes" id="player_name" class="form-control" value="<?php if(isset($_POST["players|name"])){echo $_POST['players|name']; } ?>">
  <div id="player_name_status"></div>
</div>
    
<div class="form-group">
  Enter your Email Address<br>
  <input type="email" name="players|email" data-is="yes" data-comma="yes" id="player_email" class="form-control" value="<?php if(isset($_POST["players|email"])){echo $_POST['players|email']; } ?>">
  <div id="player_email_status"></div>
</div>

<div class="form-group">  
  Contact No<br> <input type="text" data-is="yes" id="player_contactno" class="form-control" name="players|contact_no" value="<?php if(isset($_POST["players|contact_no"])){echo $_POST['players|contact_no']; } ?>">
<div id="player_contactno_status"></div>
</div>


<div class="form-group">  
Password <br><input type="password" id="player_password" class="form-control" name="players|password" value="<?php if(isset($_POST["players|password"])){echo $_POST['players|password']; } ?>">
<div id="player_password_status"></div>
</div>
    <button type="submit" id="save_button" type="button" class="btn btn-success" value="Save Changes">Save</button>        
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