<?php
session_start();
$i = 0;
$j = 0;
foreach($_POST as $key => $value)
{
	if (($key == "login" && $value != "") || ($key == "passwd" && $value != "")
		|| ($key == "submit" && $value == "OK"))
		$i++;
}
if ($i == 3)
{
	$exists = false;
	$accounts = array();
	$login = $_POST["login"];
	$pass = $_POST["passwd"];
	if (!file_exists("../private"))
		mkdir("../private", 0777, true);
	if (!file_exists("../private/passwd"))
		file_put_contents("../private/passwd", serialize($accounts));
	$cont = file_get_contents("../private/passwd");
	if ($cont != "")
	{
		$accounts = unserialize($cont);
		$len = 0;
		foreach ($accounts as $account)
		{
			if ($account["login"] == $login)
				$exists = true;
			$len++;
		}
		if ($exists == false)
		{
			$accounts[$len]["login"] = $login;
			$accounts[$len]["passwd"] = hash("whirlpool", "kyriakos" . $pass);
			file_put_contents("../private/passwd", serialize($accounts));
			echo "OK\n";
			header("Location: index.html");
		}
		else
		{
			echo "ERROR\n";
		}
	}
}
else
	echo "ERROR\n";

?>
