<?PHP

	function ft_sort(&$tab)
	{
		$i = 0;
		while (isset($tab[$i]))
		{
			$j = $i + 1;
			while ($j < count($tab))
			{
				if (strtolower($tab[$i]) > strtolower($tab[$j]))
				{
					$temp = $tab[$i];
					$tab[$i] = $tab[$j];
					$tab[$j] = $temp;
				}
				$j++;
			}

			$i++;
		}
	}

	function ft_print_tab($tab)
	{
		$i = 0;
		while (isset($tab[$i]))
		{
			echo $tab[$i] . "\n";
			$i++;
		}
	}

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

	function ft_get_args($argv)
	{
		$i = 1;
		$ret = array();
		$ot = 0;
		while (isset($argv[$i]))
		{
			$temp = ft_split($argv[$i]);
			$j = 0;
			while (isset($temp[$j]))
			{
				$ret[$ot] = $temp[$j];
				$j++;
				$ot++;
			}
			$i++;
		}
		return $ret;
	}

	if (isset($argv[1]))
	{
		$args = ft_get_args($argv);
		$nums = array();
		$other = array();
		$chars = array();
		$n = 0;
		$o = 0;
		$c = 0;
		$i = 0;
		while (isset($args[$i]))
		{
			if (preg_match("/^[0-9]/", $args[$i]))
				$nums[$n++] = $args[$i];
			else if (preg_match("/^[a-zA-Z]/", $args[$i]))
				$chars[$c++] = $args[$i];
			else
				$other[$o++] = $args[$i];
			$i++;
		}
		sort($nums);
		sort($other);
		ft_sort($chars);
		ft_print_tab($chars);
		ft_print_tab($nums);
		ft_print_tab($other);
	}
	else
		echo "Error no input\n";

?>
