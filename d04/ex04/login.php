<?php

	include("auth.php");
	session_start();
	$i = 0;
	$error = true;
	foreach ($_POST as $key => $value)
	{
		if ($key == "login" || $key == "passwd")
			$i++;
	}
	if ($i == 2)
	{
		if (auth($_POST["login"], $_POST["passwd"]) == true)
		{
			$_SESSION["logged_on_user"] = $_POST["login"];
			$error = false;
		}
	}
	else
		$error = true;
	if ($error == false)
		echo "<html><body>
			<iframe name='chat' src='chat.php' width='100%' height='550px'></iframe>
			<iframe name='speak' src='speak.php' width='100%' height='50px'></iframe>
			</body></html>";
	else
	{
		$_SESSION["logged_on_user"] = "";
		echo "ERROR\n";
	}
?>
