<?php 
include_once("session.php");
include("header.php");
include_once("updatedata.php");
include_once("singlegetdata.php");


singletable("players_profile","WHERE user_id = '".$user_id."'");
singletable("players_workplace","WHERE user_id = '".$user_id."'");
singletable("players_achievement","WHERE user_id = '".$user_id."'");
singletable("players","WHERE id = '".$user_id."'");

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
                      <center>Your Profile Picture</center>
                    </div>
                </div>  
            </div>
            <div class="col-md-9">
                <div class="card">                
                    <div class="card-body">                        
                        <h4 class="card-title">Your Profile</h4>
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



  <script>  
  var arr_till = <?php if(!empty($_POST['players_workplace|workplace_till'])){echo $_POST['players_workplace|workplace_till'];}else{echo "[]";} ?>;
  var arr_name = <?php if(!empty($_POST['players_workplace|workplace_name'])){echo $_POST['players_workplace|workplace_name'];}else{echo "[]";} ?>;
  var arr_from = <?php if(!empty($_POST['players_workplace|workplace_from'])){echo $_POST['players_workplace|workplace_from'];}else{echo "[]";} ?>;
  var arr_location = <?php if(!empty($_POST['players_workplace|workplace_location'])){echo $_POST['players_workplace|workplace_location'];}else{echo "[]";} ?>;
  var arr_position = <?php if(!empty($_POST['players_workplace|workplace_position'])){echo $_POST['players_workplace|workplace_position'];}else{echo "[]";} ?>;
    
  var workplace_count = arr_name.length;  
  
  
  var editworkplace_id = "";
  
  function addworkplace()
  {				
		var workplace_from = document.getElementById("workplace_from").value;
		var workplace_till = document.getElementById("workplace_till").value;
		var workplace_position = document.getElementById("workplace_position").value;
		var workplace_name = document.getElementById("workplace_name").value;
		var workplace_location = document.getElementById("workplace_location").value;
		
		arr_name.push(workplace_name);
		arr_till.push(workplace_till);
		arr_from.push(workplace_from);
		arr_location.push(workplace_location);
		arr_position.push(workplace_position);
			
		if(editworkplace_id != "")
		{
			remove_workplace(editworkplace_id);
			editworkplace_id = "";
		}
		
		
		workplace_count++;
		showworkplace();
  }
  
  function showworkplace()
  {
	  document.getElementById("workplaces_name").value = JSON.stringify(arr_name);
	  document.getElementById("workplaces_position").value = JSON.stringify(arr_position);
	  document.getElementById("workplaces_location").value = JSON.stringify(arr_location);
	  document.getElementById("workplaces_from").value = JSON.stringify(arr_from);
	  document.getElementById("workplaces_till").value = JSON.stringify(arr_till);
	 
	 
	  document.getElementById("workplace_name").value = "";
	  document.getElementById("workplace_from").value = "";
	  document.getElementById("workplace_till").value = "";
	  document.getElementById("workplace_position").value = "";
	  document.getElementById("workplace_location").value = "";
	 	 
	  var month = new Array();
	  month[0] = "January";
	  month[1] = "February";
	  month[2] = "March";
	  month[3] = "April";
	  month[4] = "May";
	  month[5] = "June";
	  month[6] = "July";
	  month[7] = "August";
	  month[8] = "September";
	  month[9] = "October";
	  month[10] = "November";
	  month[11] = "December";
	  
	  document.getElementById("place_work").innerHTML = "";
	  var workplaces_c = 0;
	  //console.log(workplace_count);
	  
	  while(workplaces_c != workplace_count )
	  {		
		 //console.log(arr_from[workplaces_c]);
		 if(arr_name[workplaces_c])	
		 {
		 if(!arr_from[workplaces_c]){arr_from[workplaces_c] = new Date();}	 
		 if(!arr_till[workplaces_c]){arr_till[workplaces_c] = new Date();}	 
		 
		 var fromdate = new Date(arr_from[workplaces_c]);
		 var tilldate = new Date(arr_till[workplaces_c]);
		 
		 $("#place_work").append('<div class="card"><div class="card-body"><div class="pull-right"><div class="btn-group"><button type="button" class="btn btn-danger" onclick="remove_workplace(\''+workplaces_c+'\')">Remove</button><button type="button" class="btn btn-light" onclick="edit_workplaces(\''+workplaces_c+'\')">Edit</button></div></div><h4>'+arr_position[workplaces_c]+'</h4><h5>'+arr_name[workplaces_c]+'</h5><h5>'+arr_location[workplaces_c]+'</h5><h6><i>'+fromdate.getDate()+' '+month[fromdate.getMonth()]+' '+ fromdate.getFullYear()+'- '+tilldate.getDate()+' '+month[tilldate.getMonth()]+' '+ tilldate.getFullYear() +'</i></h6></div></div>');
		 }
		  workplaces_c++;
	  }
	  
	  $("#myModal").modal("hide");
  }
  
  function edit_workplaces(id)
  {	  	  
	  document.getElementById("workplace_name").value = arr_name[id];
	  document.getElementById("workplace_from").value = arr_from[id];
	  document.getElementById("workplace_till").value = arr_till[id];
	  document.getElementById("workplace_position").value = arr_position[id];
	  document.getElementById("workplace_location").value = arr_location[id];	 
	  editworkplace_id = id;
	  $("#myModal").modal("show");
  }
  
  function remove_workplace(id)
  {
	  arr_from.splice(id, 1);
	  arr_till.splice(id, 1);
	  arr_position.splice(id, 1);
	  arr_name.splice(id, 1);
	  arr_location.splice(id, 1);		  
	  	  
		showworkplace();
		$("#myModal").modal("hide");
  }
  </script>
  
 <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Place You Worked</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<div class="form-group">
			  Workplace Name<br>
			  <input type="text" id="workplace_name" data-comma="yes" class="form-control">
			</div>
			
			<div class="form-group">
			  Workplace Location<br>
			  <input type="text" id="workplace_location" data-comma="yes" class="form-control">
			</div>

			<div class="form-group">
			  Position<br>
			  <input type="text" id="workplace_position" data-comma="yes" class="form-control">
			</div>


			<div class="form-group">
			   From<br>
			  <input type="date"  id="workplace_from" data-comma="yes" class="form-control">
			</div>
			   Till<br>
			   <input type="checkbox" onchange="show_till()" id="workplace_current">&nbsp You currently work here.
			  <input type="date" id="workplace_till" class="form-control">
			</div>
			<button type="button" class="btn btn-success" onclick="addworkplace()">Add</button>
			</div>
        
		
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>		  
        </div>
        
      </div>
    </div>
  </div>
  




  <script>
  
  
  var arr_achievetitle =  <?php if(!empty($_POST['players_achievement|achievements_title'])){echo $_POST['players_achievement|achievements_title'];}else{echo "[]";} ?>;
   var arr_achievedesc = <?php if(!empty($_POST['players_achievement|achievements_desc'])){echo $_POST['players_achievement|achievements_desc'];}else{echo "[]";} ?>;
  
  var achievement_count = arr_achievetitle.length;  
  //var arrs_achievetitle =  [<?php if(!empty($_POST['players_achievement|achievements_title'])){echo ($_POST['players_achievement|achievements_title']);}else{echo "";} ?>];
  // var arrs_achievedesc = [<?php if(!empty($_POST['players_achievement|achievements_desc'])){echo ($_POST['players_achievement|achievements_desc']);}else{echo '';} ?>];
  
  var editachieve_id = "";
  
  
  function show_till()
  {
  var checkbox_current =  document.getElementById("workplace_current").checked;
 
  if(checkbox_current == true){
  $("#workplace_till").hide();
  }
  else{
  $("#workplace_till").show();
  }
  }
  
  function addachievement()
  {				
		var achievement_title = document.getElementById("achievement_title").value;
		var achievement_desc = document.getElementById("achievement_desc").value;
		
		arr_achievetitle.push(achievement_title);
		arr_achievedesc.push(achievement_desc);		
		
		//arrs_achievetitle.push(JSON.stringify(achievement_title));
		//arrs_achievedesc.push(JSON.stringify(achievement_desc));		
		//arrs_achievetitle.push('"'+achievement_title+'"');
		//arrs_achievedesc.push('"'+achievement_desc+'"');		
		
		
		if(editachieve_id != "")
		{
			remove_achivement(editachieve_id);
			editachieve_id = "";
		}
		
		achievement_count++;
		showachievement();
  }
  
  function showachievement()
  {
	  document.getElementById("achievements_title").value = JSON.stringify(arr_achievetitle);
	  document.getElementById("achievements_desc").value = JSON.stringify(arr_achievedesc);	  
	 
	  document.getElementById("achievement_title").value = "";
	  document.getElementById("achievement_desc").value = "";
	 	 
	  
	  document.getElementById("list_achievement").innerHTML = "";
	  var achievement_c = 0;
	  
	  
	  while(achievement_c != achievement_count )
	  {				  
		 if(arr_achievetitle[achievement_c])	
		 {		
		 $("#list_achievement").append(' <div class="card mb-2 m-3">   <div class="row no-gutters">     <div class="col-md-1"><center>       <h1><i class="fa fa-trophy p-4"></i></h1>     </div>     <div class="col-md-8">	        <div class="card-body">	         <h5 class="card-title">'+arr_achievetitle[achievement_c]+'</h5>		         <p class="card-text">'+arr_achievedesc[achievement_c]+'</p>        		<div class="pull-right"><div class="btn-group"><button type="button" class="btn btn-danger" onclick="remove_achivement(\''+achievement_c+'\')">Remove</button><button type="button" class="btn btn-light" onclick="edit_achivement(\''+achievement_c+'\')">Edit</button></div></div> 		<br> 	  </div> 	      </div>   </div> </div>');		
		 }
		  achievement_c++;
	  }
	  
	  $("#addachievement").modal("hide");
	  console.log(arr_achievedesc);
	  console.log(arr_achievetitle);
  }
  
  function edit_achivement(id)
  {	  	  
	  document.getElementById("achievement_title").value = arr_achievetitle[id];
	  document.getElementById("achievement_desc").value = arr_achievedesc[id];
	  editachieve_id = id;
	  $("#addachievement").modal("show");
  }
  
  function remove_achivement(id)
  {	 
	  
	  arr_achievetitle.splice(id, 1);
	  arr_achievedesc.splice(id, 1);
	
	 // arrs_achievetitle.splice(id, 1);
	 // arrs_achievedesc.splice(id, 1);	
	  
	 // console.log(arrs_achievedesc);
		showachievement();
		$("#addachievement").modal("hide");
  }
  

  </script>
  

<!-- The Modal -->
  <div class="modal" id="addachievement">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Your Achievements</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<div class="form-group">
			  Achievement Title<br>
			  <input type="text" id="achievement_title" data-comma="yes" class="form-control">
			</div>
			
			<div class="form-group">
			  Achievement Description<br>
			  <input type="text" id="achievement_desc" data-comma="yes" class="form-control">
			</div>
			
			<button type="button" class="btn btn-success" onclick="addachievement()">Add</button>
			</div>
        
		
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>		  
        </div>
        
      </div>
    </div>
  </div>


<!-- The Modal -->
<div class="modal" id="profileimg">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Profile Image</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">        
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Upload Image" name="submit" onclick="saveimage('<?php echo $_POST['players|id']; ?>')">		
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<?php 
include_once("footer.php");
?>

<script>

function saveimage(id){			
		var profileimage = $('#fileToUpload').prop('files')[0];
		var form_data = new FormData();                  
		form_data.append('fileToUpload', profileimage);			
		
		$.ajax({
        url: 'saveprofile.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(response){
			alert("Successfull Uploaded. Save to Make the Changes.");
			//alert(response);
            if(response)
			{
				document.getElementById("players_profile|profile_image").value = response;
				document.getElementById("display_profileimage").value = response;
			}
        }
		});
}
</script>

<script>

<?php 
//if(isset($_POST["players|sports"])){echo 'var sportsplay = ['.$_POST["players|sports"].'];var sportsplays = [];';}else {echo 'var sportsplay = [];var sportsplays = [];';}?> 

var sportsplay = <?php echo json_encode(str_getcsv($_POST["players|sports"]));?>;

  
  function showbadages()
  {	  	    	
	
	 document.getElementById("addedsports").innerHTML = "";	 	 
	 document.getElementById("og_sports").value = sportsplay;
		console.log(sportsplay);
		
	 for(i = 0; i < sportsplay.length; i++){ 	 
		if(sportsplay[i]){
			 $("#addedsports").append('<span class="badge badge-secondary p-2 m-1">'+sportsplay[i]+' <p style="display:inline;color:white;background-color:inherit;border:0px solid ;padding:0.1em;" onclick="removefromsportlist(\''+sportsplay[i]+'\')">x</p></span>');	 
		}
	 }
	 
  }
  
  
  function removefromsportlist(value)
  {
	  sportsplay.indexOf(value) !== -1 && sportsplay.splice(sportsplay.indexOf(value), 1)	 
	  //sportsplays.indexOf(value) !== -1 && sportsplays.splice(sportsplays.indexOf(value), 1)	 
	  showbadages();
  }
  
  function addtosportlist(element, value)  
  {	 
	  if(value != null){
	  document.getElementById(element).value = "";
	  document.getElementById("autocompleteitems").innerHTML = "";
	  if(!sportsplay.includes(value))
	  {
	  sportsplay.push(value);
	//  sportsplays.push('"'+value+'"');	  
	  }
	  showbadages();	  
	  }
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
		addtosportlist(fieldid, opts[i].value);
		//alert(opts[i].value);
        break;
      }
    }
}
  showbadages();  
  showachievement();
  showworkplace();
  
  </script>
 <script src="authenticate.js"></script>