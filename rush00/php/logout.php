<?php

	/*
	 * Resets the login and redirects to the landing page
	 * TODO Hasn't been tested
	 */

	session_start();
	$_SESSION["logged_on_user"] = "";
	header ("Location: ../index.php");
?>
