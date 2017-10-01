<?php

require_once 'Vertex.class.php';
require_once 'Vector.class.php';

Class Matrix {

	const IDENTITY = 'IDENTITY';
	const SCALE = 'SCALE';
	const RX = '0x ROTATION';
	const RY= '0y ROTATION';
	const RZ = '0z ROTATION';
	const TRANSLATION = 'TRANSLATION';
	const PROJECTION = 'PROJECTION';

	private $_vtcX;
	private $_vtcY;
	private $_vtcY;
	private $_vtxO;

	public function __construct($kwargs)
	{
		$_vtcX = new Vector( array( 'dest'=>new Vertex( array( 'x'=>1.0, 'y'=>0.0, 'z'=>0.0))));
		$_vtcY = new Vector( array( 'dest'=>new Vertex( array( 'x'=>0.0, 'y'=>1.0, 'z'=>0.0))));
		$_vtcZ = new Vector( array( 'dest'=>new Vertex( array( 'x'=>0.0, 'y'=>0.0, 'z'=>1.0))));
		$_vtxO = new Vertex( array( 'x'=>0.0, 'y'=>0.0, 'z'=>0.0));

		$preset = $kwargs['preset'];

		if ($preset == self::SCALE)
			$this->_scale($kwargs["scale"];
		else if ($preset == self:TRANSLATION)
			$this->_translate($kwargs["vtc"]);
	}

	private function _scale($scale)
	{
		$scale = $kwargs['scale'];
		$_vtcX = $_vtcX->scalarProduct($scale);
		$_vtcY = $_vtcY->scalarProduct($scale);
		$_vtcZ = $_vtcZ->scalarProduct($scale);
		$_vtxO->setX($_vtxO->getX() * $scale);
		$_vtxO->setY($_vtxO->getY() * $scale);
		$_vtxO->setZ($_vtxO->getZ() * $scale);
		$_vtxO->setW($_vtxO->getW() * $scale);
	}

	private function _translate(Vector $vtc)
	{
		$_vtxO->setX($vtc->getX());
		$_vtxO->setY($vtc->getY());
		$_vtxO->setZ($vtc->getZ());
	}
}

?>
