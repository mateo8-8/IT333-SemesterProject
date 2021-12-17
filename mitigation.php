<?php

$servername = "localhost";
$username = "mbm";
$password = "password";
$dbname = "aq";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 


$userid = $_REQUEST['first_name'];
$password = $_REQUEST['last_name'];

$sanitized_userid =
	mysqli_real_escape_string($conn, $userid);
	
$sanitized_password =
	mysqli_real_escape_string($conn, $password);
	
$sql = "SELECT * FROM checkout WHERE fname = '"
	. $sanitized_userid . "' AND pass = '"
	. $sanitized_password . "'";
	
$result = mysqli_query($conn, $sql)
	or die(mysqli_error($conn));
	
$num = mysqli_fetch_array($result);
	
if($num > 0) {
	echo "Your new secure password has been sent to you via email";
}
else {
	echo "Wrong username or password, please enter them again";
}

?>

