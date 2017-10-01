<?php

	function ft_is_sort($tab)
	{
		$temp = $tab;
		sort($temp);
		$i = 0;
		while (isset($tab[$i]))
		{
			if ($tab[$i] != $temp[$i])
				return false;
			$i++;
		}
		return true;
	}

?>
