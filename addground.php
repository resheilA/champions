<?php 

include_once("header.php");
?>

<!-- content-with-photo4 block -->
<section class="" id="about">
<?php echo $error_mysql; ?>			

	
<div class="container-md-3 p-5 my-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card" style="width:300px">
                    <img class="card-img-top" id="display_profileimage" src="<?php if(isset($_POST["players_profile|profile_image"])) {echo $_POST["players_profile|profile_image"];}else { echo "https://www.w3schools.com/bootstrap4/img_avatar1.png";} ?>" alt="Profile image">
                    <div class="card-img-overlay">
                        <h4 class="card-text">
  <button type="button"  class="btn btn-lg border" style="background-color:lightgrey;"  data-toggle="modal" data-target="#profileimg"><h3>
   <i class="fa fa-picture-o"></i> Change</h3>
</button></h4>
                    </div>
                    <div class="card-body">
                      <center>Ground's Picture</center>
                    </div>
                </div>  
            </div>
            <div class="col-md-9">
                <div class="card">                
                    <div class="card-body">                        
                        <h4 class="card-title">Ground Profile</h4>
                        <form method="post" id="player_profile" onsubmit="event.preventDefault(); checkauthentic();">
				<input type="hidden" id="players_profile|profile_image" name="players_profile|profile_image" value="<?php if(isset($_POST["players_profile|profile_image"])) {echo $_POST["players_profile|profile_image"];}?>">
	<input type="hidden" id="workplaces_from" name="players_workplace|workplace_from" />
	<input type="hidden" id="workplaces_name" name="players_workplace|workplace_name" />
	<input type="hidden" id="workplaces_till" name="players_workplace|workplace_till" />
	<input type="hidden" id="workplaces_position" name="players_workplace|workplace_position" />
	<input type="hidden" id="workplaces_location" name="players_workplace|workplace_location" />	
	<input type="hidden" id="achievements_title" name="players_achievement|achievements_title" />	
	<input type="hidden" id="achievements_desc" name="players_achievement|achievements_desc" />	
	<input type="hidden" name="players_workplace|user_id" value="<?php echo $_POST['players|id']; ?>"/>	
	<input type="hidden" name="players_achievement|user_id" value="<?php echo $_POST['players|id']; ?>"/>	
	<input type="hidden" name="players|id" value="<?php echo $_POST['players|id']; ?>"/>	
	<input type="hidden" name="players_profile|user_id" value="<?php echo $_POST['players|id']; ?>"/>	
    
<div class="form-group">
  Name<br>
  <input type="text" name="players|name" data-is="yes" id="name" class="form-control" value="<?php if(isset($_POST["players|name"])){echo $_POST['players|name']; } ?>">
  <div id="player_name_status"></div>
</div>


    
<div class="form-group">
  Choose A Unique Name<br>
  <input type="text" name="players|uniquename" data-is="yes" data-comma="yes" id="uniquename" class="form-control" value="<?php if(isset($_POST["players|uniquename"])){echo $_POST['players|uniquename']; } ?>">
  <div id="uniquename_status"></div>
</div>

<div class="form-group">
  About<br>
  <input type="text" name="players|about" data-comma="yes" data-is="no" id="players|about" class="form-control" value="<?php if(isset($_POST["players|about"])){echo $_POST['players|about']; } ?>">
  <div id="player_about_status"></div>
</div>


<div class="form-group">  
  Contact No<br> <input type="text" data-is="yes" id="player_contactno" class="form-control" name="players|contact_no" value="<?php if(isset($_POST["players|contact_no"])){echo $_POST['players|contact_no']; } ?>">
<div id="player_contactno_status"></div>
</div>



<div class="form-group">
  Sports You Are Interested In<br>
  <h5>
  <div id="addedsports">
  </div>
  </h5>
  <input type="hidden" name="players|sports" id="og_sports" value="<?php if(isset($_POST["players|sports"])){echo $_POST['players|sports']; } ?>">
  <input type="text" list="autocompleteitems" onclick="addtosportlist('sports_list')" onInput="showsports('getsports.php', 'sports_list')" id="sports_list" class="form-control" placeholder="Enter the sports you are interested"/>  
  <datalist id="autocompleteitems">
</datalist>
</div>	

<div id="place_work">
</div>


  <button type="button"  class="btn btn-lg border p-5 " style="background-color:transparent;"  data-toggle="modal" data-target="#myModal"><h3>
   <i class="fa fa-university"></i> Add a workplace</h3>
</button>
 
<div id="list_achievement">
</div>


  <button type="button"  class="btn btn-lg border p-5 " style="background-color:transparent;"  data-toggle="modal" data-target="#addachievement"><h3><i class='fa fa-trophy'></i> Add a achievement</h3>
</button>

<div class="form-group">  
<br>Password <br><input type="password" id="password" class="form-control" name="players|password" value="<?php if(isset($_POST["players|password"])){echo $_POST['players|password']; } ?>">
<div id="player_password_status"></div>
</div>
    <button type="submit" id="save_button" type="button" class="btn btn-success" value="Save Changes">Save</button>    
</form>

                    </div>                    
                </div>    
            </div>                        
        </div>                     
    </div>

</section>





<?php 
include_once("footer.php");
?>