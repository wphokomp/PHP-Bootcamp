<?php

function display()
{
	
}

session_start();
if ($_SESSION["logged_on_user"] != "")
{
	date_default_timezone_set("Africa/Johannesburg");
	$i = 0;
	foreach ($_POST as $key => $value)
	{
		if (($key == "msg" && $value != "") || ($key == "submit" && $value == "OK"))
			$i++;
	}
	if ($i == 2)
	{
		$time = date("Y-m-d H:i:s", time());
		$msg = $_POST["msg"];
		$login = $_SESSION["logged_on_user"];

		$file = "../private/chat";
		$messages = array();
		if (!file_exists("../private"))
			mkdir($file, 0777, true);
		if (!file_exists($file))
			file_put_contents($file, serialize($messages));
		flock($file, LOCK_EX);
		$messages = unserialize(file_get_contents($file));
		$len = 0;
		foreach($messages as $message)
			$len++;
		$messages[$len]["login"] = $login;
		$messages[$len]["msg"] = $msg;
		$messages[$len]["time"] = $time;
		file_put_contents($file, serialize($messages));
		fclose($file);
		$error = false;
	}
	else
	{
		?>
		<html>
		<body>
		<form method = "post" action = "speak.php" width="100%" align="center">
			<input type="text" name="msg" height="100%" width="80%" value=""/>
			<input type="submit" name="submit" value="OK"/>
		</form>
		</body>
		</html>
		<?php
	}
}
else
	echo "ERROR\n";
?>
