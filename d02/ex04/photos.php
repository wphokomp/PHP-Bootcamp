#!/usr/bin/php
<?PHP

function ft_split($str, $del)
{
	$arr = explode($del, $str);
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
	if ($ch = curl_init($argv[1]))
	{
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
		$tab = ft_split($result, "\n");
		$i = 0;
		$k = 0;
		while (isset($tab[$i]))
		{
			if (preg_match("/img/", strtolower($tab[$i])))
			{
				$begin = strpos(strtolower($tab[$i]), "src=") + 5;
				$end = strpos($tab[$i], "\"", $begin);
				$img[$k] = substr($tab[$i], $begin, $end - $begin);
				$k++;
			}
			$i++;
		}
		$i = 0;
		while (isset($img[$i]))
		{
			$folder = substr($argv[1], strpos($argv[1], "http://") + 7) . "/";
			$temp = ft_split($img[$i], "/");
			$file = $temp[count($temp) - 1];
			if (!file_exists("./" . $folder))
				mkdir("./" . $folder);
			shell_exec("curl -s " . $img[$i] . "> ./".$folder."/".$file);
			$i++;
		}
	}
	else
		echo "Error opening webpage please check URL";
}
else
	echo "No argument found";

?>
