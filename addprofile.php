<?php 

include("header.php");
include_once("updatedata.php");
include_once("singlegetdata.php");


singletable("players_achievement","WHERE user_id = '42'");
singletable("players","WHERE id = '42'");

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

$_POST["achievements|user_id"] = $_POST["players|id"];
$_POST["workplace|user_id"] = $_POST["players|id"];
?>


<!-- content-with-photo4 block -->
<section class="" id="about">
<div class="container-md-3 p-5 my-3">
	
	<div class="row">
            <div class="col-md-3">
                <div class="card" style="width:300px">
                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="Card image">
                    <div class="card-img-overlay">
                        <h4 class="card-text">Change</h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text.</p>    
                    </div>
                </div>  
            </div>
            <div class="col-md-9">
                <div class="card">                
                    <div class="card-body">                        
                        <h4 class="card-title">Your Profile</h4>
                        <form method="post">
							<div class="form-group">
							  Name<br>
							  <input type="text" name="players|name" data-is="yes" id="name" class="form-control" value="<?php if(isset($_POST["players|name"])){echo $_POST['players|name']; } ?>">
							  <div id="player_name_status"></div>
							</div>

							<div class="form-group">
							  About<br>
							  <input type="text" name="players|about" data-comma="no" data-is="no" id="players|about" class="form-control" value="<?php if(isset($_POST["players|about"])){echo $_POST['players|about']; } ?>">
							  <div id="player_about_status"></div>
							</div>


							<div class="form-group">
							  Email<br>
							  <input type="email" data-is="yes" name="players|email" id="email" class="form-control" value="<?php if(isset($_POST["players|email"])){echo $_POST['players|email']; } ?>">    
							  <div id="player_email_status"></div>
							</div>

							<div class="form-group">  
							  Contact No<br> <input type="text" data-is="yes" id="player_contactno" class="form-control" name="players|contact_no" value="<?php if(isset($_POST["players|contact_no"])){echo $_POST['players|contact_no']; } ?>">
							<div id="player_contactno_status"></div>
							</div>
							
							<div class="form-group">  
							Password <br><input type="password" id="password" class="form-control" name="players|password" value="<?php if(isset($_POST["players|password"])){echo $_POST['players|password']; } ?>">
							<div id="player_password_status"></div>
							</div>
							

							<div class="form-group">
							  Sports You Are Interested In<br>
							  <h5>
							  <div id="addedsports">
							  </div>
							  </h5>
							  <input type="hidden" name="players|sports" id="og_sports" value='<?php if(isset($_POST["players|sports"])){echo $_POST['players|sports']; } ?>'>
							  <input type="text" list="autocompleteitems" onclick="" onInput="showsports('getsports.php', 'sports_list')" id="sports_list" class="form-control" placeholder="Enter the sports you are interested"/>  
							  <datalist id="autocompleteitems">
							</datalist>
							</div>	

							
								<button type="submit" id="save_button" type="button" class="btn btn-success" value="Save Changes">Save</button>    
							</form>

					</div>
				</div>
			</div>
	</div>			
</div>
</section>
<script>

  var sportsarr = <?php echo json_encode(str_getcsv($_POST["players|sports"]));?>;
  
  function showbadages()
  {	  	    
	
  }
  
  
  function removefromsportlist()
  {
	 
  }
  
  function addtosportlist(value)  
  {	 
		
	 document.getElementById("autocompleteitems").innerHTML = "";
	 sportsarr.push(value);
	 console.log(sportsarr);
	 document.getElementById("sports_list").value = "";
	 document.getElementById("og_sports").value = sportsarr;
  }
  
  function showsports(urls, fieldid){	  
		
	var input = document.getElementById(fieldid).value;	 
	if(input.length == 3){
			$.ajax({
                url: urls,
                type: 'POST',				
                data: {bar: input},				
                success: function (result) {				
					$("#autocompleteitems").append(result);					
                }
            });			
	}
	
	var val = document.getElementById(fieldid).value;
    var opts = document.getElementById('autocompleteitems').childNodes;
    
	for (var i = 0; i < opts.length; i++) {
		if (opts[i].value === val) {			
				addtosportlist(opts[i].value);
				break;
		}
	}	
	
}

showsports();
</script>
<?php 
include_once("footer.php");
?>