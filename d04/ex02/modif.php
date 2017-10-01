<?php

	$error = true;
	$i = 0;
	foreach($_POST as $key => $value)
	{
		if ($key == "login" || $key == "oldpw" || ($key == "newpw" && $value != "")
			|| ($key == "submit" && $value == "OK"))
			$i++;
	}
	if ($i == 4)
	{
		$users = unserialize(file_get_contents("../private/passwd"));
		$error = true;
		$i = 0;
		$index = 0;
		foreach ($users as $user)
		{
			if ($user["login"] == $_POST["login"] && $user["passwd"] == hash("whirlpool", "kyriakos" . $_POST["oldpw"]))
			{
				$error = false;
				$index = $i;
			}
			$i++;
		}
	}
	if ($error == true)
		echo "ERROR\n";
	else
	{
		$users[$index]["passwd"] = hash("whirlpool", "kyriakos".$_POST["newpw"]);
		file_put_contents("../private/passwd", serialize($users));
		echo "OK\n";
	}
?>
