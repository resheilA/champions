	var statusa = [];
	
 document.addEventListener('keyup', event => {
	// console.log(event.target.id);	 
	removecomma(event.target.id);
	 if(event.target.id){
	 getauthentication(event.target.id);	 
	 }
	 
 });
 
 document.addEventListener('keydown', event => {
	// console.log(event.target.id);	 
	removecomma(event.target.id);
	 if(event.target.id){
	 getauthentication(event.target.id);	 
	 }
	 
 });
 
 document.addEventListener('click', event => {
	 console.log(event.target.id);	 
	removecomma(event.target.id);
	 if(event.target.id){
	 getauthentication(event.target.id);	 
	 }
	 
 });


	function removecomma(id){
		if( document.getElementById(id) && (document.getElementById(id).getAttribute("data-comma") != "no")){
			if(document.getElementById(id).value != ""){
			var element_value = document.getElementById(id).value;
			element_value = element_value.replace (/"/g, "");
			element_value = element_value.replace (/'/g, "");
			document.getElementById(id).value = element_value;
			}
		}
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
									if(!statusa.includes(id)){statusa.push(id)};		
								}
								else
								{
								statusa.indexOf(id) !== -1 && statusa.splice(statusa.indexOf(id), 1)
								}
								
								console.log(statusa);								
								if(statusa.length == 0){
								$("#save_button").show();											
								}
								else{									
									$("#save_button").hide();
								}
						 
					}	
                }
            });								
	}	
	
	function checkauthentic(){		
			if(statusa.length == 0){
				console.log("here");
				var form = document.getElementById("player_profile");
				form.submit();
				}
			else{									
				alert("Please fill up all the details properly.");
				}
	}
	
