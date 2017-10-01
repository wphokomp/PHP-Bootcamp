<?PHP

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
			return "Syntax error 3";
	}
	else
		return "Syntax error 1";
}

if (isset($argv[1]))
{
	$args = array();
	if ($tmpargs = preg_split("/[+|-|*|%|\/]/", $argv[1]))
	{
		$args[0] = trim($tmpargs[0]);
		if (preg_match("/[+]/", $argv[1]) > 0)
			$args[1] = "+";
		else if (preg_match("/[-]/", $argv[1]) > 0)
			$args[1] = "-";
		else if (preg_match("/[\/]/", $argv[1]) > 0)
			$args[1] = "/";
		else if (preg_match("/[*]/", $argv[1]) > 0)
			$args[1] = "*";
		else if (preg_match("/[%]/", $argv[1]) > 0)
			$args[1] = "%";
		$args[2] = trim($tmpargs[1]);
		echo ft_do_op($args);
	}
	else
		echo "Syntax Error 2";
}
else
	echo "No arguments";
echo "\n";

?>
