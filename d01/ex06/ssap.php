<?php

function ft_split($str)
{
	$arr = explode(" ", $str);
	$ret = array();
	$i = 0;
	$j = 0;
	while (isset($arr[$i]))
	{
		if ($arr[$i] != "")
		{
			$ret[$j] = $arr[$i];
			$j++;
		}
		$i++;
	}
	sort($ret);
	return $ret;
}

	if (isset($argv[1]))
	{
		$output = "";
		$args = array();
		$i = 1;
		while (isset($argv[$i]))
		{
			$output = $output . " " . $argv[$i];
			$i++;
		}
		$args = ft_split($output);
		$i = 0;
		while (isset($args[$i]))
		{
			echo $args[$i] . "\n";
			$i++;
		}
	}
	else
		echo "No input\n";

?>
