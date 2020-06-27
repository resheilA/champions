
<?php 


$page = isset( $_GET['page'] ) ? $_GET['page'] : "";

switch ( $page ) {
    case 'home':
      adduserrole();
      break;
    case 'signup':
      signup();	 
      break;  	
    case 'editprofile':
      editprofile();	
		break;
    case 'addprofile':
      addprofile();	 	  	 	  
	  break;
    case 'viewprofile':
      viewprofile();	 
      break; 
    case 'viewgrounds':
      viewgrounds();	 
      break; 
	case 'listevents':
      listevents();	 
      break;   
	case 'aboutus':  
	  aboutus();
	  break;
	case 'services':  
	  services();
	  break;  
    case 'login':
      login();	 
      break; 
	case 'addground':
	  addground();	
	  break;
}

function addground(){
	$result["title"] = "Add a Sports Infrastructure";
	$result["sub_title"] = "Add your turf, stadium, infrastructure, etc from here";
	$result["titlebar"] = "no";
	//$result["success_redirect"] = "dashboard.php";
	include("addground.php");		
}

function services(){
	$result["title"] = "Services";
	$result["sub_title"] = "How are we connected";
	$result["titlebar"] = "yes";
	//$result["success_redirect"] = "dashboard.php";
	include("services.php");	
}

function aboutus(){		
	$result["title"] = "About Us";
	$result["sub_title"] = "Know about Champion";
	$result["titlebar"] = "yes";
	//$result["success_redirect"] = "dashboard.php";
	include("about.php");	
}	
	
function listevents(){		
	$result["title"] = "Signup";
	$result["sub_title"] = "Signup with us";
	$result["titlebar"] = "no";
	$result["success_redirect"] = "dashboard.php";
	include("listevents.php");	
}	

function viewgrounds(){
	$result["title"] = "Signup";
	$result["sub_title"] = "Signup with us";
	$result["titlebar"] = "no";
	$result["success_redirect"] = "dashboard.php";
	include("viewgrounds.php");	
}	

function login(){
	$result["title"] = "Signup";
	$result["sub_title"] = "Signup with us";
	$result["titlebar"] = "no";
	$result["success_redirect"] = "dashboard.php";
	include("login.php");	
}	
	
function signup(){
	$result["title"] = "Signup";
	$result["sub_title"] = "Signup with us";
	$result["titlebar"] = "no";
	$result["success_redirect"] = "dashboard.php";
	include("signup.php");
}


	
function editprofile(){
	$result["title"] = "Edit profile";
	$result["sub_title"] = "Edit your sports profile from here";
	$result["titlebar"] = "yes";
	$result["success_redirect"] = "dashboard.php";
	include("profile.php");	
}

function addprofile(){
	$result["title"] = "Edit profile";
	$result["sub_title"] = "Edit your sports profile from here";
	$result["titlebar"] = "yes";
	$result["success_redirect"] = "dashboard.php";
	include("addprofile.php");
	
}

function viewprofile(){	
	$result["title"] = "View Profile";
	$result["sub_title"] = "See the profile details";
	$result["titlebar"] = "no";
	$result["success_redirect"] = "dashboard.php";
	include("viewprofile.php");
}
?>