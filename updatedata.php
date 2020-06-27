<?php 
$arraykey = array_keys($_POST);

$_POST = preg_replace("/<.+>/sU", "", $_POST);
//var_dump($_POST);

//////////////////FIRST CREATEING A 2d array of FORMAT 
////////////////// array[tablename][variablename]
///////////////////


$table_count = 0;
$variable_count = 0;
$array_select = [];
foreach($arraykey as $key)
{
$keypiece = explode("|", $key);
$table_name = $keypiece[0];
$variable_name = $keypiece[1];

///// ADDING THE TABLES and variables IN THE 2-D ARRAY 
 
		//$array_select[$table_count] = $table_name;
		$array_select[$table_name][$variable_count] = $variable_name; /////addded here
		$variable_count++;
		$table_count++;
}

//echo"<pre>";


	foreach(array_keys($array_select) as $tablename)
	{
		//////RUNNING A LOOP FOR TABLE NAME
		
		$variable_string = "";
		$value_string = "";
		$update_string ="";
		$firstcount = 0;
		$firstcount_value = 0;
		
		///// CREATING A VARIABLE STRING
		
		foreach($array_select[$tablename] as $variname)
		{
			/////RUNNING A LOOP FOR VARIABLE NAME AND PREPARING INSET STIRNG
			
			if($firstcount == 0)	
			{
				$variable_string .= "".$variname;		         
			}
			else 
			{
				$variable_string .= ", ".$variname;		         
			}
			
			$firstcount++;
		}
		
		
		/////////CREATING A VALUE STRING 
		
		foreach($array_select[$tablename] as $variname)
		{
			/////RUNNING A LOOP FOR VARIABLE NAME AND GETTING AND PREPARING VALUE STRING
			$joined_string = $tablename."|".$variname;
			
			if($firstcount_value == 0)	
			{
				$value_string .= "'".$_POST[$joined_string]."'";		         
			}
			else 
			{
				$value_string .= ", '".$_POST[$joined_string]."'";		         
			}
			
			$firstcount_value++;
		}
		
		//////////CREATING A VARIABLE-VALUE UPDATE STRING
		$numvariable = count($array_select);
		$updatevar_count  = 0;
		foreach($array_select[$tablename] as $variname)
		{
			/// GETTING THE POST NAME
			$joined_string = $tablename."|".$variname;
			
			$uvalue_string = "'".$_POST[$joined_string]."'";		         
			$uvariable_string = $variname;		         
						
			
			if ($variname === end($array_select[$tablename])) {
					$update_string .= $uvariable_string.'='.$uvalue_string.'';
			  }
			else{
				$update_string .= $uvariable_string.'='.$uvalue_string.',';
			}
		}
		
		
		include("connect.php");	
				
				$sql = "INSERT INTO ".$tablename." (".$variable_string.")
				VALUES (".$value_string.")  ON DUPLICATE KEY UPDATE " . $update_string;
	
				if ($conn->query($sql) === TRUE) {
					//echo "New record created successfully";
					
					$error_mysql = '
								<div class="alert alert-success">
							<strong>Profile successfully Updated !</strong>
							</div>
					';

				} else {
					//echo "Error: " . $sql . "<br>" . $conn->error;
					
					$error_mysql = '
								<div class="alert alert-danger">
							<strong>Error!</strong> Cannot update the data. Please check the data entered.
							</div>
					';
				}

				$conn->close();				
			
	}

	
?>