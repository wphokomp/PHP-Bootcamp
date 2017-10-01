<?php

	function ft_do_op($args)
	{
		if (is_numeric($args[0]) && is_numeric($args[2]))
		{
			if ($args[1] == "+")
				return strval(intval($args[0]) + intval($args[2]));
			else if ($args[1] == "-")
				return strval(intval($args[0]) - intval($args[2]));
			else if ($args[1] == "*")
				return strval(intval($args[0]) * intval($args[2]));
			else if ($args[1] == "%")
				return strval(intval($args[0]) % intval($args[2]));
			else if ($args[1] == "/")
				return strval(intval($args[0]) / intval($args[2]));
			else
				return "Invalid operrand";
		}
		else
			return "Arguments not numbers";
	}

	if (count($argv) == 4)
	{
		$args = array();
		$args[0] = trim($argv[1]);
		$args[1] = trim($argv[2]);
		$args[2] = trim($argv[3]);
		echo ft_do_op($args) . "\n";
	}
	else
		echo "Invalid number of arguments\n";

?>
