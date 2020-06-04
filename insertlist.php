<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports";
$string = "Archery,Badminton,Cricket,Bowling,Boxing,Curling,Tennis,Skateboarding,Surfing,Hockey,Figure skating,Yoga,Fencing,Fitness,Gymnastics,Karate,Volleyball,Weightlifting,Basketball,Baseball,Rugby,Wrestling,High jumping,Hang gliding,Car racing,Cycling,Running,Table tennis,Fishing,Judo,Climbing,Billiards,Shooting,Horse racing,Horseback riding,Golf,Football";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sports = explode(",", $string);
foreach($sports as $element){
	$sql = "INSERT INTO sports_list (name)
	VALUES ('".$element."')";

	if (mysqli_query($conn, $sql)) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
mysqli_close($conn);

?>