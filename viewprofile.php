<?php 

include_once("session.php");
include_once("header.php");
include_once("singlegetdata.php");



singletable("players_profile","WHERE user_id = '".$user_id."'");
singletable("players_workplace","WHERE user_id = '".$user_id."'");
singletable("players_achievement","WHERE user_id = '".$user_id."'");
singletable("players","WHERE id = '".$user_id."'");



$workplace_name = [];
$workplace_location = [];
$workplace_position = [];
$workplace_till = [];
$workplace_from = [];

$achievements_title = [];
$achievements_desc = [];

$respond_mysql = $_POST;

if(isset($respond_mysql["players_workplace|workplace_name"]))$workplace_name = json_decode ($respond_mysql["players_workplace|workplace_name"]);
if(isset($respond_mysql["players_workplace|workplace_location"]))$workplace_location = json_decode ($respond_mysql["players_workplace|workplace_location"]);
if(isset($respond_mysql["players_workplace|workplace_position"]))$workplace_position = json_decode ($respond_mysql["players_workplace|workplace_position"]);
if(isset($respond_mysql["players_workplace|workplace_from"]))$workplace_from = json_decode ($respond_mysql["players_workplace|workplace_from"]);
if(isset($respond_mysql["players_workplace|workplace_till"]))$workplace_till = json_decode ($respond_mysql["players_workplace|workplace_till"]);
if(isset($respond_mysql["players_achievement|achievements_title"]))$achievements_title = json_decode ($respond_mysql["players_achievement|achievements_title"]);
if(isset($respond_mysql["players_achievement|achievements_desc"]))$achievements_desc = json_decode ($respond_mysql["players_achievement|achievements_desc"]);
$listsports =  explode("," ,$respond_mysql["players|sports"]);
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

?>

<!-- content-with-photo4 block -->
<section class="" id="about">
<div class="container-md-3 p-5 my-3">

        <div class="row">
            <div class="col-md-3">
                <div class="card" style="width:300px">
                    <img class="card-img-top" id="display_profileimage" src="<?php if(isset($respond_mysql["players_profile|profile_image"])) {echo $respond_mysql["players_profile|profile_image"];}else { echo "https://www.w3schools.com/bootstrap4/img_avatar1.png";} ?>" alt="Profile image">
                    <div class="card-body">
                        <h4 class="card-title" style="display:inline;"><?php echo $respond_mysql["players|name"];?></h4><i class="fa fa-check-circle pl-1" style="color:skyblue;display:inline;" aria-hidden="true"></i> 
						<p class="card-text"><?php echo $respond_mysql["players|about"];?></p> 
						<br><a href="pages.php?page=editprofile"><button type="button" class="btn btn-success btn-block">Edit Profile</button></a>
						
					<hr><center>					                    
					<?php foreach($listsports as $sport){if($sport){echo '<p style="display:inline;font-size:1.4em;"><span class="badge badge-success p-2 m-1 text-light" style="background-color:;">'.$sport.'</span></h5>';}}?>					
					<p class="pt-2">Sports</center>
					
						<hr>   <center>
                    <h4 style="color:gold;"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
					Rated by Champion</center>
					
						<hr><center>
					<h5 style="color:darkgreen;display:inline;"><i class="fa fa-phone" aria-hidden="true"></i></h5><p style="display:inline;"> <?php echo $respond_mysql["players|contact_no"];?>  / </p><h5 style="color:darkgreen;display:inline;"><i class="fa fa-envelope" aria-hidden="true"></i></h5><p style="display:inline;"> <?php echo $respond_mysql["players|email"];?> </p>
					
					</div>
					
                </div>  
            </div>
            <div class="col-md-9">
                <div class="card text-success" >                
                    <div class="card-body">                        
                        <h4 class="card-title">Experience</h4>			
						<?php for($i=0;$i<sizeof($workplace_name);$i++){							
							if(empty($workplace_till[$i])){$workplace_till[$i] = "Now";}
							echo '<hr>
								<div class="row"><h1 style="display:inline;color:green;"><i class="fa fa-flag-checkered p-4"></i></h1><div class="col">
						<h4>'.$workplace_position[$i].'</h4><h5>'.$workplace_name[$i].'</h5><h5>'.$workplace_location[$i].'</h5><h6 class="pt-1"><i>'.date_format(date_create_from_format('Y-m-d', $workplace_from[$i]), 'jS M Y').' - '.$workplace_till[$i].'</i></h6></div></div>';
						}
						if(sizeof($workplace_name) == 0){
							echo '
								<div class="card mb-2"><div class="card-body">
									<center><h4>We Will Help You Find A Work Place Soon !</center></div></div>';							
						}
						?>
					</div>
				</div>
				
				<?php if(sizeof($achievements_title) > 0){ echo '
				<div class="card text-success mt-2">                
                    <div class="card-body">                        
                        <h4 class="card-title">Achievements</h4>
				';}
				?>
						<?php for($i=0;$i<sizeof($achievements_title);$i++){							
						 echo '<hr><div class="row no-gutters">     <div class="col-md-1"><center><h1  style="color:gold;"><i class="fa fa-trophy p-4"></i></h1>     </div>     <div class="col-md-8"><div class="card-body"><h5 class="card-title">'.$achievements_title[$i].'</h5><p class="card-text">'.$achievements_desc[$i].'</p></div> 	      </div>   </div> 
						';
						}?>
				<?php if(sizeof($achievements_title) > 0){ echo '		
					</div>
				</div>';}?>
				
			</div>
		</div>
</div>  
 
<?php 
include_once("footer.php");
?>