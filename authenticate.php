<?php 

//var_dump($_POST); 


if($_POST["datais"] == "yes" && (!$_POST["val"]))
{
		echo "This is compulsory. ";
}
else
{
	echo "";
}

if($_POST['type'] == "email")
{
	if (!filter_var($_POST["val"], FILTER_VALIDATE_EMAIL)) {
	 echo $emailErr = "Invalid email format";
	}
	else
	{
	 echo "";
	}
}
else if($_POST['type'] == "text")
{
	if (strpos($_POST['id'], 'contactno') !== false) 
	{
		if (!preg_match('/^[0-9]{10}+$/', $_POST['val'])) {
		 echo $emailErr = "Invalid contact number";
		}
		else
		{
		 echo "";
		}
	}
	else if(strpos($_POST['id'], 'uniquename') !== false) 
	{
			$str = $_POST['val'];
			if (preg_match('/^\S.*\S$/', $str)) {
				//echo "Spaces not allowed";
			} 
			else if ($str == trim($str) && strpos($str, ' ') !== false) {
				echo 'Spaces not allowed.<br>';
			}
			else {
				echo "Spaces not allowed.<br>";
			}
			
			if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬-]/', $_POST["val"]))
				{
					echo "Special Characters are not allowed.";
				}
			
			if($_POST["val"]){
			include("connect.php");
			
			$query = "SELECT uniquename from players where uniquename='".$_POST['val']."'";
			$result = mysqli_query($conn, $query);

			if(mysqli_num_rows($result) > 0)
			{					
				echo 'Name Already Taken. Choose a different name.<br>';
			}
			}
	}
}
else if($_POST['type'] == "password")
{
	if (strlen($_POST["val"]) <= 5) {
        echo "Your Password Must Contain At Least 5 Characters!";
    }
	else{
		echo "";
	}
}


?>