#!/usr/bin/php
<?PHP

function ft_split($str)
{
	$arr = preg_split("/[\s\t]/", $str);
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
	$args = ft_split(trim($argv[1]));
	$i = 0;
	$check = 0;
	while (isset($args[$i]))
	{
		if ($check == 1)
			echo " ";
		else
			$check = 1;
		echo $args[$i];
		$i++;
	}
} else
	echo "No argument found";
echo "\n";

?>
