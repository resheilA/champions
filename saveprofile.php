<?php 
include("session.php");
include("connect.php");

$sql = "SELECT folder FROM players where email = '".$user_email."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	  
	  if(!empty($row["folder"])){
		$folder = $row["folder"];
	  }
	  else{	
		 $folder = md5(uniqid(rand(), true));	  
		  mkdir("users/images/".$folder."/");
		  include("connect.php");
		  
			$sqlin = "UPDATE players SET folder='".$folder."' WHERE email = '".$user_email."'";


			if ($conn->query($sqlin) === TRUE) {
			//  echo "New record created successfully";
			} else {
			//  echo "Error: " . $sqlin . "<br>" . $conn->error;
			}
	  }
  }
}


mysqli_close($conn);


$target_dir = "users/images/".$folder."/";
$target_ext =  $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_ext,PATHINFO_EXTENSION));
$target_file = $target_dir . "profile.".$imageFileType;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
  //  echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
  //  echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  //echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //echo basename( $_FILES["fileToUpload"]["name"]);
	echo $target_file;
  } else {
    //echo "Sorry, there was an error uploading your file.";
  }
}


?>