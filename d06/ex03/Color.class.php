<?php

Class Color {

	public $red, $green, $blue;
	static $verbose = False;

	public function __construct($rgb)
	{
		if (array_key_exists('red', $rgb))
		{
			if (is_numeric($rgb["red"]))
				$this->red = intval($rgb["red"]);
			else
				$this->red = hexdec($rgb["red"]);

			if (is_numeric($rgb["green"]))
				$this->green = intval($rgb["green"]);
			else
				$this->green = hexdec($rgb["green"]);

			if (is_numeric($rgb["blue"]))
				$this->blue = intval($rgb["blue"]);
			else
				$this->blue = hexdec($rgb["blue"]);
		}
		else
		{
			$i_rgb = $rgb["rgb"];
			$hex = str_pad(dechex($i_rgb), 6, '0', STR_PAD_LEFT);
			$this->red = hexdec(substr($hex, 0, 2));
			$this->green = hexdec(substr($hex, 2, 2));
			$this->blue = hexdec(substr($hex, 4, 2));
		}
		if (self::$verbose)
			print($this . ' constructed.' . PHP_EOL);
	}

	public function __tostring() {
		return 'Color ( red: ' . $this->red . ', green: ' . $this->green . ', blue: ' . $this->blue . ' )';
	}

	public function __destruct() {
		if (self::$verbose)
			print($this . ' destructed.'. PHP_EOL);
	}

	static function doc()
	{
		$str = file_get_contents("Color.doc.txt");
		return $str;
	}

	function add($instance)
	{
		$t_rgb = array();
		$t_rgb["red"] = $this->red + $instance->red;
		$t_rgb["green"] = $this->green + $instance->green;
		$t_rgb["blue"] = $this->blue + $instance->blue;
		$new = new Color($t_rgb);
		return $new;
	}

	function sub($instance)
	{
		$t_rgb = array();
		$t_rgb["red"] = $this->red - $instance->red;
		$t_rgb["green"] = $this->green - $instance->green;
		$t_rgb["blue"] = $this->blue - $instance->blue;
		return new Color($t_rgb);
	}

	function mult($instance)
	{
		$t_rgb = array();
		$t_rgb["red"] = $this->red * $instance;
		$t_rgb["green"] = $this->green * $instance;
		$t_rgb["blue"] = $this->blue * $instance;
		return new Color($t_rgb);
	}
}

?>
