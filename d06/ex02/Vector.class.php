<?php
	require_once 'Vertex.class.php';
	Class Vector {

		private $_x;
		private $_y;
		private $_z;
		private $_w;
		static $verbose = False;

		public function getX() { return $this->_x; }
		public function getY() { return $this->_y; }
		public function getZ() { return $this->_z; }
		public function getW() { return $this->_w; }

		public function __construct($args)
		{
			$orig = new Vertex(array(0.0, 0.0, 0.0, 1.0));
			$dest = $args["dest"];
			if (array_key_exists('orig', $args))
				$orig = clone $args["orig"];

			$this->_x = $dest->getX() - $orig->getX();
			$this->_y = $dest->getY() - $orig->getY();
			$this->_z = $dest->getZ() - $orig->getZ();
			$this->_w = $dest->getW() - $orig->getW();
			$this->_norm = false;

			if (self::$verbose)
				print($this . " constructed" . PHP_EOL);
		}

		public function __tostring()
		{
			$str = sprintf( "Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
			return $str;
		}

		public function __destruct()
		{
			if (self::$verbose)
				print($this . " destructed".PHP_EOL);
		}

		public function normalize()
		{
				$mag = $this->magnitude();
				$arr = array('x' => $this->_x / $mag, 'y' => $this->_y / $mag,
					'z' => $this->_z / $mag );
				return new Vector(array('dest' => new Vertex($arr)));
		}

		static function doc()
		{
			$str = file_get_contents("Vector.doc.txt");
			return $str;
		}

		public function add($rhs)
		{
			$n_x = $this->_x + $rhs->getX();
			$n_y = $this->_y + $rhs->getY();
			$n_z = $this->_z + $rhs->getZ();
			return new Vector( array( 'dest' => new Vertex( array('x'=>$n_x, 'y'=>$n_y, 'z'=>$n_z))));
		}

		public function sub($rhs)
		{
			$n_x = $this->_x - $rhs->getX();
			$n_y = $this->_y - $rhs->getY();
			$n_z = $this->_z - $rhs->getZ();
			return new Vector( array( 'dest' => new Vertex( array( 'x'=>$n_x, 'y'=>$n_y, 'z'=>$n_z))));
		}

		public function cos( $rhs )
		{
			Vector::$verbose = false;
			$t_1 = $this->normalize();
			$t_2 = $rhs->normalize();
			$t = $t_1->dotProduct($t_2);
			Vector::$verbose = true;
			return $t;
		}

		public function crossProduct( $rhs )
		{
			$n_z = $this->_x * $rhs->getY() - $this->_y * $rhs->getX();
			$n_y = $this->_z * $rhs->getX() - $this->_x * $rhs->getZ();
			$n_x = $this->_y * $rhs->getZ() - $this->_z * $rhs->getY();
			return new Vector( array( 'dest' => new Vertex( array( 'x'=>$n_x, 'y'=>$n_y, 'z'=>$n_z))));
		}

		public function opposite()
		{
			$n_x = $this->_x * -1;
			$n_y = $this->_y * -1;
			$n_z = $this->_z * -1;
			return new Vector( array( 'dest' => new Vertex( array( 'x'=>$n_x, 'y'=>$n_y, 'z'=>$n_z))));
		}

		public function scalarProduct( $k )
		{
			$n_x = $this->_x * $k;
			$n_y = $this->_y * $k;
			$n_z = $this->_z * $k;
			return new Vector( array( 'dest' => new Vertex( array( 'x'=>$n_x, 'y'=>$n_y, 'z'=>$n_z))));
		}

		public function dotProduct( $rhs )
		{
			return (float) ($this->_x*$rhs->getX() + $this->_y*$rhs->getY() + $this->_z*$rhs->getZ());
		}

		public function magnitude()
		{
			return ( sqrt( pow( $this->_x, 2 ) + pow( $this->_y, 2 ) + pow( $this->_z, 2 )));
		}
	}

?>
