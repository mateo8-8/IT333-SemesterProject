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

$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];

$sql = "SELECT * FROM checkout WHERE fname='$first_name' or lname='$last_name'";
$result = $conn->query($sql);
echo"<h1> Welcome back ".$first_name." here is your account information</h1>";
if ($result->num_rows > 0) {
	// output data of each row
	//echo "<ul>"
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " Name: " . $row["fname"]. " Last Name: " . $row["lname"]. "Password: " . $row["pass"] . " Email: ".$row["email"]."<br>";
  }
} else {
  echo "0 results";
}
//echo "</ul>";
$conn->close();
?>




