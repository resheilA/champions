<?php 

include_once("header.php");
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
                        <form action="savedata.php" method="post">
    <input type="hidden" name="id" value="<?php echo $results['players']->id ?>"/>
    <input type="hidden" name="roleid" value="<?php echo "13114113"; ?>"/>
    <input type="hidden" id="workplaces_from" name="workplace_from" />
	<input type="hidden" id="workplaces_name" name="workplace_name" />
	<input type="hidden" id="workplaces_till" name="workplace_till" />
	<input type="hidden" id="workplaces_position" name="workplace_position" />
	<input type="hidden" id="workplaces_location" name="workplace_location" />	
	<input type="hidden" id="achievements_title" name="achievements_title" />	
	<input type="hidden" id="achievements_desc" name="achievements_desc" />	
    
    <input type="hidden" name="player" value="yes"/>


	
<div class="form-group">
  Name<br>
  <input type="text" name="name" data-is="yes" id="player_name" class="form-control" value="<?php echo $results['players']->name; ?>">
  <div id="player_name_status"></div>
</div>


<div class="form-group">
  About<br>
  <input type="text" name="about" data-is="no" id="player_about" class="form-control" value="<?php echo $results['players']->about; ?>">
  <div id="player_about_status"></div>
</div>


<div class="form-group">
  Email<br>
  <input type="email" data-is="yes" name="email" id="player_email" class="form-control" value="<?php echo $results['players']->email; ?>">    
  <div id="player_email_status"></div>
</div>

<div class="form-group">  
  Contact No<br> <input type="text" data-is="yes" id="player_contactno" class="form-control" name="contact_no" value="<?php echo htmlspecialchars( $results['players']->contact_no )?>">
<div id="player_contactno_status"></div>
</div>



<div class="form-group">
  Sports You Are Interested In<br>
  <h5>
  <div id="addedsports">
  </div>
  </h5>
  <input type="hidden" name="sports" id="og_sports" value="<?php echo $results['players']->sports; ?>">
  <input type="text" name="sports" list="autocompleteitems" onclick="addtosportlist('sports_list')" onInput="showsports('getsports.php', 'sports_list')" id="sports_list" class="form-control" placeholder="Enter the sports you are interested"/>  
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
<br>Password <br><input type="password" id="player_password" class="form-control" name="password" value="<?php echo htmlspecialchars( $results['players']->password )?>">
<div id="player_password_status"></div>
</div>
    <button type="submit" id="save_button" type="button" class="btn btn-success" name="saveChanges" value="Save Changes">Save</button>    
</form>

                    </div>                    
                </div>    
            </div>                        
        </div>                     
    </div>

</section>



  <script>
  var workplace_count = 0;
  var arr_till = [];
  var arr_name = [];
  var arr_from = [];
  var arr_location = [];
  var arr_position = [];
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
	  document.getElementById("workplaces_name").value = arr_name;
	  document.getElementById("workplaces_position").value = arr_position;
	  document.getElementById("workplaces_location").value = arr_location;
	  document.getElementById("workplaces_from").value = arr_from;
	  document.getElementById("workplaces_till").value = arr_till;
	 
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
	  console.log(workplace_count);
	  
	  while(workplaces_c != workplace_count )
	  {		
		 console.log(arr_from[workplaces_c]);
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
			  <input type="text" id="workplace_name" class="form-control">
			</div>
			
			<div class="form-group">
			  Workplace Location<br>
			  <input type="text" id="workplace_location" class="form-control">
			</div>

			<div class="form-group">
			  Position<br>
			  <input type="text" id="workplace_position" class="form-control">
			</div>


			<div class="form-group">
			   From<br>
			  <input type="date"  id="workplace_from" class="form-control">
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
  var achievement_count = 0;
  var arr_achievetitle = [];
  var arr_achievedesc = [];
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
	  document.getElementById("achievements_title").value = arr_achievetitle;
	  document.getElementById("achievements_desc").value = arr_achievedesc;	  
	 
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
			  <input type="text" id="achievement_title" class="form-control">
			</div>
			
			<div class="form-group">
			  Achievement Description<br>
			  <input type="text" id="achievement_desc" class="form-control">
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


<?php 
include_once("footer.php");
?>

<script>

 document.addEventListener('keydown', event => {
	// console.log(event.target.id);	 
	removecomma(event.target.id);
	 if(event.target.id){
	 getauthentication(event.target.id);	 
	 }
 });

	function removecomma(id){
		
	}
	
  function getauthentication(id) {		
		var ele_value = document.getElementById(id).value;
		var ele_type = document.getElementById(id).type;
		var ele_id = document.getElementById(id).id;
		var datais = document.getElementById(id).getAttribute("data-is");
		var display_result = id+"_status";
			
		
		$.ajax({
                url: "authenticate.php",
                type: 'POST',				
                data: {val: ele_value, type: ele_type, id: ele_id, datais: datais},	
                success: function (result) {				
					
					if(document.getElementById(display_result))
					{
						document.getElementById(display_result).innerHTML = result;								
						
						if(result)
						{
							$("#save_button").hide();
						}
						else
						{
							$("#save_button").show();
						}
					}	
                }
            });								
	}	
	

</script>
<script>
	<?php 
		if($results['players']->sports){echo 'var sportsplay = ["'.$results['players']->sports.'"];';}
		else{echo 'var sportsplay = ["Football","Tennis","Table tennis","Running","High jumping","Cricket"];';}
	?>
  
  showbadages();
  function showbadages()
  {	  	    
	 document.getElementById("addedsports").innerHTML = "";
	 for(i = 0; i < sportsplay.length; i++){ 	 	 
	 $("#addedsports").append('<span class="badge badge-secondary p-2 m-1">'+sportsplay[i]+' <p style="display:inline;color:white;background-color:inherit;border:0px solid ;padding:0.1em;" onclick="removefromsportlist(\''+sportsplay[i]+'\')">x</p></span>');	 
	 }
  }
  
  
  function removefromsportlist(value)
  {
	  sportsplay.indexOf(value) !== -1 && sportsplay.splice(sportsplay.indexOf(value), 1)	 
	  showbadages();
  }
  
  function addtosportlist(element, value)  
  {	 
	  if(value){
	  document.getElementById(element).value = "";
	  document.getElementById("autocompleteitems").innerHTML = "";
	  if(!sportsplay.includes(value))
	  {
	  sportsplay.push(value);	  
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
		document.getElementById("og_sports").value = sportsplay;
        //alert(opts[i].value);
        break;
      }
    }
}

  </script>
 