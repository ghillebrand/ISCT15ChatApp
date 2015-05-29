<?php
$serverName = 'localhost';
$username = 'root';
$password = '';
$dbName = 'ChatApp';

//Connects to database as root user
$conn = mysqli_connect($serverName, $username, $password, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br>";

if (isset($_POST["submit"])){
		// gets password for the username given
		$username = $_POST['username'];
		// Queries database to get password
		$sql = "SELECT Password FROM Contacts WHERE UserName = '$username'";
		$result = $conn->query($sql);
		$row= $result->fetch_assoc();
		$password =$row['Password'];
		if ($conn->error == ''){
			echo "Successfull <br>";
		}else{
			echo "Failed".$conn->error."<br>";
		}
		
		// Validates password
		if (($_POST['password'] == $password)&&(!empty($_POST['password']))&&(!empty($_POST['username']))){
			session_start();
			$_SESSION['username']= $_POST['username'];
			$_SESSION['password']= $_POST['password'];
			// Close connection
			mysqli_close($dbName);
			//enter page to be redirected to here 
			header('Location: chatAppHome.php');
			exit();
		}else{
			echo ('ERROR: password incorrect username or password, please reload page and try again');
		}
	}else{
		//HTML form
		print '<h1> Login </h1>
		<p> Please enter your username and password to login. </p>
		<form action = "chatAppLogin.php" method = post><p>
		Username: <input type ="text" name="username"/><br>
		Password: <input type="text" name="password"><br>
		<input type="submit" name="submit" value="login"></p>';
}
?>		
