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
		$started = 0;
		$words = ft_split($argv[1]);
		$j = 0;
		while (isset($words[$j]))
		{
			if ($words[$j] != "")
			{
				if ($started == 1)
					echo " ";
				else
					$started = 1;
				echo $words[$j];
			}
			$j++;
		}
		echo "\n";
	}
	else
		echo "No argument found\n";

?>
