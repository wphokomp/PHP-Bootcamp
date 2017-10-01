#!/usr/bin/php
<?PHP
	date_default_timezone_set("Africa/Johannesburg");
	function ft_sort_time($arr)
	{
		$i = 0;
		while (isset($arr[$i]))
		{
			$j = $i + 1;
			while (isset($arr[$j]))
			{
				if ($arr[$j]["time"] < $arr[$i]["time"])
				{
					$temp = $arr[$i];
					$arr[$i] = $arr[$j];
					$arr[$j] = $arr[$i];
				}
				$j++;
			}
			$i++;
		}
		return $arr;
	}

	$fd = fopen("/var/run/utmpx", "r");
	$i = 0;
	while ($ut = fread($fd, 628))
	{
		$unpack = unpack("a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad", $ut);
		if ($unpack["type"] == 7)
		{
			$arr[$i] = array("line" => $unpack["line"], 
				"user" => $unpack["user"], "time" => $unpack["time1"]);
			$i++;
		}
	}
	$arr = ft_sort_time($arr);
	$i = 0;
	while (isset($arr[$i]))
	{
		echo $arr[$i]["user"] . "\t" . $arr[$i]["line"] . "\t\t" . date("M j H:i", $arr[$i]["time"]) . "\n";
		$i++;
	}
?>
