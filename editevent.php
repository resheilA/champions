<?php 

include_once("header.php");
?>

<!-- content-with-photo4 block -->
<section class="" id="about">

<div class="container-md-3 p-5 my-3">
        <div class="row">        
            <div class="container">		
                <!-- Nav pills -->
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#home">About the event</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#register">Register for the event</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#organizer">Organizers</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#sponsors">Sponsors</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#rules">Rules And Safety</a>
                    </li>                  
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#reviews">Reviews</a>
                    </li>                  
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#enteries">Enteries</a>
                    </li>      					
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#menu2">Score Board</a>
                    </li>					                                       
                    <li class="nav-item">
					<form action="index.php" method="get">
                    <button type="submit" class="btn btn-success" value="Save">Save</button>
                    </li>
                </ul>				 
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="container tab-pane active"><br>
                    <h3>Edit About us</h3>					
						<div class="form-group">
						<input type="text" id="event_name" class="form-control" name="event_name" placeholder="Event name"><br>
						<textarea name="event_aboutus" class="form-control" rows="10"></textarea>						
						</div>
                    </div>
					
                    <div id="register" class="container tab-pane fade"><br>					
					If this is a team event then the size of team : 
						<input type="number" name="event_teamsize"  class="form-control mb-3" max="20"> 
                    <h3>Questions for registering to the event</h3>
						<div class="form-group">						
						<input type="hidden" name="event_questions" id="event_questions" class="form-control">
						<input type="text" id="event_question" class="form-control">
						<button type="button" class="btn btn-primary" onclick="add_question()">Add a question</button>
						</div>
					<div id="list_questions"></div>	
                    </div>
					
					<script>
					var arr_question = [];
					var question_count = 0;
					var edit_question_flag = 0;
					
					function add_question(){
						var event_question = document.getElementById("event_question").value;
						arr_question.push(event_question);						
						question_count++;
						
						show_question();
					}
					
					function show_question()
					{
						var local_question_count = 0;
						
						document.getElementById("list_questions").innerHTML = "";
						document.getElementById("event_questions").value = arr_question;
												
						while(local_question_count != question_count){
						if(arr_question[local_question_count])
						$("#list_questions").append('<div class="card"><div class="card-body">'+arr_question[local_question_count]+'<div class="pull-right"><button type="button" class="btn btn-success" onclick="edit_question('+local_question_count+')">Edit</button><button type="button" class="btn btn-danger" onclick="remove_question('+local_question_count+')">Remove</button></div></div></div>');
						local_question_count++;
						}
						
						if(edit_question_flag == 0)
						document.getElementById("event_question").value = "";					
							
					}
					function remove_question(id){
						arr_question.splice(id, 1);
						show_question();
						edit_question_flag = 0;
					}
					
					function edit_question(id){
						document.getElementById("event_question").value = arr_question[id];
						edit_question_flag = 1;
						remove_question(id);
					}
					
					
					</script>
					
                    <div id="organizer" class="container tab-pane fade"><br>
                    <h3>Organizers</h3>						
                    	<div class="form-group">
						<input type="text" name="event_organizer" class="form-control" placeholder="Enter the username of the organizer">
						</div>
                    </div>
					
					<div id="sponsors" class="container tab-pane fade">
								
						
                    <h3 class="mt-5">Sponsors</h3>						
                    	<div class="form-group">
						<input type="text" id="event_sponsor" class="form-control" placeholder="Enter the Sponsors" maxlength="100">
						<input type="text" id="event_sponsorlink" class="form-control" placeholder="Enter a link to their website">
						<button type="button" class="btn btn-primary" onclick="add_sponsor()">Add a sponsor</button>
						</div>
						
								
						<div id="list_sponsors">
							
						</div>
                    </div>
					
					
					<script>
					var arr_sponsor = [];
					var arr_sponsorlink = [];
					var sponsor_count = 0;
					var edit_sponsor_flag = 0;
					
					function add_sponsor(){
						var event_sponsor = document.getElementById("event_sponsor").value;
						var event_sponsorlink = document.getElementById("event_sponsorlink").value;
						arr_sponsor.push(event_sponsor);						
						arr_sponsorlink.push(event_sponsorlink);						
						sponsor_count++;
						
						show_sponsor();
					}
					
					function show_sponsor()
					{
						var local_sponsor_count = 0;
						
						document.getElementById("list_sponsors").innerHTML = "";
						//document.getElementById("event_sponsors").innerHTML = arr_sponsor;
						//document.getElementById("event_sponsorslink").innerHTML = arr_sponsorlink;
						
						while(local_sponsor_count != sponsor_count){
						if(arr_sponsor[local_sponsor_count])
						$("#list_sponsors").append('<div class="card"><div class="card-body"><b><h3>'+arr_sponsor[local_sponsor_count]+'</h3></b>'+arr_sponsorlink[local_sponsor_count]+'<div class="pull-right"><button type="button" class="btn btn-success" onclick="edit_sponsor('+local_sponsor_count+')">Edit</button><button class="btn btn-danger" onclick="remove_sponsor('+local_sponsor_count+')">Remove</button type="button"></div></div></div>');
						local_sponsor_count++;
						}
						
						if(edit_sponsor_flag == 0){
						document.getElementById("event_sponsor").value = "";					
						document.getElementById("event_sponsorlink").value = "";						
						}
					}
					
					function remove_sponsor(id){
						arr_sponsor.splice(id, 1);
						arr_sponsorlink.splice(id, 1);
						show_sponsor();
						edit_sponsor_flag = 0;
					}
					
					function edit_sponsor(id){
						document.getElementById("event_sponsor").value = arr_sponsor[id];
						document.getElementById("event_sponsorlink").value = arr_sponsorlink[id];
						
						edit_sponsor_flag = 1;
						remove_sponsor(id);
					}
									</script>
					
					
					
                    <div id="rules" class="container tab-pane fade"><br>
                    <h3>Rules and Safety</h3>						
                    	<div class="form-group">
						<textarea name="event_rules" class="form-control" rows="10"></textarea>
						</div>
					</div>
					</form>
				    <div id="reviews" class="container tab-pane fade"><br>
                    <h3>Reviews</h3>						
                    	<div class="form-group">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
								<thead>
								  <tr>
									<th>Name</th>
									<th>Comment</th>
									<th>Report</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>John</td>
									<td>fwfmwkf mkfjmerkfmjrekfmre kfmjre fkemf kre mfkremf ke mfke mfDoe</td>
									<td><button type="button">Report</button></td>
								  </tr>
								  <tr>
									<td>Mary</td>
									<td>Moe</td>
									<td>mary@example.com</td>
								  </tr>
								  <tr>
									<td>July</td>
									<td>Dooley</td>
									<td>july@example.com</td>
								  </tr>
								</tbody>
								</table>
							</div>		
						</div>
					</div>
                  
				  </div>
                    
                </div>
            </div>   

        </div>                                

</section>





<?php 
include_once("footer.php");
?>