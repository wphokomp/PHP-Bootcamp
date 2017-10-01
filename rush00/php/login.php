<?php

/*
 * $_POST VARIABLES: email, passwd
 */

include("auth.php");
session_start();
if (!empty($_POST))
{
	if (auth($_POST["email"], $_POST["passwd"]))
	{
		$_SESSION["logged_on_user"] = $_POST["email"];
		/*
		 * User logged in successfully
		 * TODO 
		 */
	}
	else
	{
		/*
		 * Email/Password was incorrect
		 * TODO tell user
		 */
	}
}
else
{
	/*
	 * $_POST is empty, TODO show html
	 * Alternatively .html can be used
	 */
}
?>
