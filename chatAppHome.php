<?php
print '<div align="center"><h1> Chat App V1.0 </h1></div>';

//To access session variables
session_start();
echo ("You are logged in as: ".$_SESSION['username']."<br>");

//  User clicks to log out
print '<a href="chatAppLogout.php">Log Out</a>';

//create table to house iframes for sending and displaying messages
//insert src for send page
print'<table border="1" style="width:100%">
			<tr>
				<td>Send<br><iframe src="chatAppDisplay.php" name="display" align = "centre" height="400" width="100%" scrolling="yes" seamless></iframe></td>
				<td>Recieve<br><iframe src="connect01.html" name = "conn01" align = "centre" height="400" width="100%" scrolling="no" seamless></iframe></td>
			</tr>
		</table>';
?>
