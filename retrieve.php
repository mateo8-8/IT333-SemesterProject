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

$sql = "SELECT * FROM checkout WHERE fname=$first_name or lname=$last_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>




