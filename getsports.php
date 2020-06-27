<?php 
	include("config.php");
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT name FROM sports_list where name LIKE '%".$_POST['bar']."%'";
    $st = $conn->prepare( $sql );    
    $st->execute();
    
	while ( $row = $st->fetch() ) {      
      $list[] = $row;
    }
		
	if(isset($list))
	foreach($list as $sport)
	{
		echo '<option value="'.$sport["name"].'">'.$sport["name"].'</option>';
	}	

    $conn = null;
    
?>