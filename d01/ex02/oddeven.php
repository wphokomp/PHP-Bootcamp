<?php
	echo "Enter a number: ";
	while ($line = fgets(STDIN))
	{
		$line = trim($line);
		if (strlen($line) == strlen(strval(intval($line))) && is_numeric($line))
		{
			if (intval($line) % 2 == 0)
				echo "the number " . $line . " is even\n";
			else
				echo "the number " . $line . " is odd\n";
		}
		else
			echo "'" . $line . "'" .  " is not a number\n";
		echo "Enter a number: ";
	}

?>
