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
	return $ret;
}

if (isset($argv[1]))
{
	$tab = ft_split($argv[1]);
	$i = 1;
	$check = 0;
	while (isset($tab[$i]))
	{
		if ($check == 0)
			$check = 1;
		else
			echo " ";
		echo $tab[$i];
		$i++;
	}
	echo " " . $tab[0];
	echo "\n";
}
else
	echo "No input found\n";

?>
