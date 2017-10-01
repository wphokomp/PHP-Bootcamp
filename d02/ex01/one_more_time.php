#!/usr/bin/php
<?PHP

function check_day($day)
{
	if (strtolower($day) == "lundi")
		return true;
	if (strtolower($day) == "mardi")
		return true;
	if (strtolower($day) == "mercredi")
		return true;
	if (strtolower($day) == "jeudi")
		return true;
	if (strtolower($day) == "vendredi")
		return true;
	if (strtolower($day) == "samedi")
		return true;
	if (strtolower($day) == "dimanche")
		return true;
	return false;
}

function get_month($mon)
{
	if (strtolower($mon) == "janvier")
		return 1;
	if (strtolower($mon) == "fevrier")
		return 2;
	if (strtolower($mon) == "mars")
		return 3;
	if (strtolower($mon) == "avril")
		return 4;
	if (strtolower($mon) == "mai")
		return 5;
	if (strtolower($mon) == "juin")
		return 6;
	if (strtolower($mon) == "juillet")
		return 7;
	if (strtolower($mon) == "aout")
		return 8;
	if (strtolower($mon) == "septembre")
		return 9;
	if (strtolower($mon) == "octrobre")
		return 10;
	if (strtolower($mon) == "novembre")
		return 11;
	if (strtolower($mon) == "decembre")
		return 12;
	return false;
}

function check_format($str)
{
	if(!($args = preg_split("/\s+/", $str)))
		return false;
	if (!isset($args[4]) || !check_day($args[0]))
		return false;
	if (!($day = intval($args[1])))
		return false;
	if (!($month = get_month($args[2])))
		return false;
	if(!($year = intval($args[3])))
		return false;
	if (!($fullTime = preg_split("/:/", $args[4])))
		return false;
	if (!isset($args[2]))
		return false;
	if (!($hour = intval($fullTime[0])))
		return false;
	if (!($min = intval($fullTime[1])))
		return false;
	if (!($sec = intval($fullTime[1])))
		return false;
	echo mktime($hour, $min, $sec, $month, $day, $year, 1);
	return true;
}

if (isset($argv[1]))
{
	date_default_timezone_set('Europe/Paris');
	if (!check_format($argv[1]))
		echo "Wrong Format";
	echo "\n";
}
else
	echo "No arguments found\n";

?>
