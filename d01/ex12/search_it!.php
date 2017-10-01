<?PHP
	$output = "";
	if (isset($argv[1]))
	{
		$key = $argv[1];
		$i = 2;
		while(isset($argv[$i]))
		{
			$tab = explode(":", $argv[$i]);
			if ($tab[0] == $key)
				$output = $tab[1] . "\n";
			$i++;
		}
	}
	else
		echo "No key given\n";
	echo $output;
?>
