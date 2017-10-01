<?php

	include("auth.php");
	session_start();
	$i = 0;
	$error = true;
	foreach ($_GET as $key => $value)
	{
		if ($key == "login" || $key == "passwd")
			$i++;
	}
	if ($i == 2)
	{
		if (auth($_GET["login"], $_GET["passwd"]) == true)
		{
			$_SESSION["logged_on_user"] = $_GET["login"];
			$error = false;
		}
	}
	else
		$error = true;
	if ($error == false)
		echo "OK\n";
	else
	{
		$_SESSION["logged_on_user"] = "";
		echo "ERROR\n";
	}
?>
