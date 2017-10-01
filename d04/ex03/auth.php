<?php

	function auth($login, $passwd)
	{
		$file = "../private/passwd";
		$users = unserialize(file_get_contents($file));
		$found = false;
		foreach ($users as $user)
		{
			if ($user["login"] == $login && $user["passwd"] == hash("whirlpool", "kyriakos".$passwd))
				$found = true;
		}
		return $found;
	}

?>
