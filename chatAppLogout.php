<?php
// This page will log out the user by closing the session

//Starts thes session so $_SESSON can be accessed
session_start();

//Deletes the session variable
unset ($_SESSION);

//Destroys sessiom data
session_destroy();

print'<div align="center"><h1>Logged out</h1>
		<p><h3>So long and thanks for all the fish</h3></p></div>';//or what ever you will
?>
