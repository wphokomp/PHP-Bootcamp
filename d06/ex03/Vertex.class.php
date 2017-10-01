<?php

require_once 'Color.class.php';

Class Vertex {

	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 0.0;
	private $_color = 0;
	static $verbose = False;

	public function __construct($args)
	{
		$this->setX($args["x"]);
		$this->setY($args["y"]);
		$this->setZ($args["z"]);
		$this->setColor(new Color(array('red'=>255, 'green'=>255, 'blue'=>255)));
		$this->setW(1.0);

		if (array_key_exists('w', $args))
			$this->setW($args["w"]);
		if (array_key_exists('color', $args))
			$this->setColor($args["color"]);

		if (self::$verbose)
			print($this . " constructed.".PHP_EOL);
	}

	public function __destruct()
	{
		if (self::$verbose)
			print($this . " destructed.".PHP_EOL);
	}

	static function doc()
	{
		$str = file_get_contents("Vertex.doc.txt");
		return $str;
	}

	public function __tostring()
	{
		$str = sprintf( "Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f", $this->_x, $this->_y, $this->_z, $this->_w);
		if (self::$verbose)
			$str .= ", " . $this->getColor();
		$str .= " )";
		return $str;
	}

	public function getX()
	{
		return $this->_x;
	}
	public function setX($x)
	{
		$this->_x = floatval($x);
		return;
	}
	public function getY()
	{
		return $this->_y;
	}
	public function setY($y)
	{
		$this->_y = floatval($y);
		return;
	}
	public function getZ()
	{
		return $this->_z;
	}
	public function setZ($z)
	{
		$this->_z = floatval($z);
		return;
	}
	public function getW()
	{
		return $this->_w;
	}
	public function setW($w)
	{
		$this->_w = floatval($w);
		return;
	}
	public function getColor()
	{
		return $this->_color;
	}
	public function setColor(Color $color)
	{
		$this->_color = clone $color;
		return;
	}
}

?>
