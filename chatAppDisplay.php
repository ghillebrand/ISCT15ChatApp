<?php
$servername = "localhost"; //Server name
$dbUsername = "root"; // deafult mysql user name
$password = ""; // deafult mysql user password
$dbName = "ChatApp"; // enterdatbase name here

// Create connection
$conn = mysqli_connect($servername, $dbUsername, $password, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br>";

//Start Session
session_start();
$_SESSION['groupID'] = 1;
$username = $_SESSION['username'];
$groupID = $_SESSION['groupID'];

//selects fields from a table
$sql = "SELECT UserName, Message FROM MessageLogs WHERE GroupID='$groupID'";
$result = $conn->query($sql);
//Tells the reader the status of the query
echo "Message retreval: ";
if ($conn->query($sql) == True){
	echo "Successful <br>";
}else{
	echo "Failed <br>";
}

//Prints all applicable records
if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		echo ($row['UserName'].' Says: '.$row['Message']."<br>");
		}
}else{
	echo "Resuslts = 0";
}

//Refresh chat
print '<a href="http://localhost/chatApp/chatAppDisplay.php">Refresh</a>';
?>
