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

?>
