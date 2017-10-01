#!/usr/bin/php
<?PHP

if (isset($argv[1]))
{
	if ($fd = fopen($argv[1], 'r'))
	{
		while ($line = fgets($fd))
		{
			if (preg_match("/<a/", strtolower($line)))
			{
				if ($posTitle = strpos(strtolower($line), "title="))
				{
					$end = strpos($line, "\"", $posTitle + 7);
					$title = substr($line, $posTitle + 7, $end - $posTitle - 7);
					$line = str_replace("$title", strtoupper($title),  $line);
				}
				$posValue = strpos($line, "<a");
				$posValue = strpos($line, ">", $posValue);
				$end = strpos($line, "<", $posValue);
				$value = substr($line, $posValue + 1, $end - $posValue);
				$line = str_replace("$value", strtoupper($value), $line);
			}
			echo $line;
		}
		fclose($fd);
	}
	else
		echo "Error opening file " . $argv[1];
}
else
	echo "No arguments found\n";

?>
