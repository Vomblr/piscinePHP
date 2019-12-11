<?php

	require_once 'Color.class.php';

	class Vertex
	{
		private $_x;
		private $_y;
		private $_z;
		private $_w = 1.0;
		private $_color;
		static $verbose = false;

		public function __construct($coords)
		{
			$this->_x = $coords['x'];
			$this->_y = $coords['y'];
			$this->_z = $coords['z'];
			if (isset($coords['w']) && !empty($coords['w']))
				$this->_w = $coords['w'];
			if (isset($coords['color']) && !empty($coords['color']) && $coords['color'] instanceof Color)
				$this->_color = $coords['color'];
			else
				$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
			if (Self::$verbose)
				echo $this->__toString() . ' constructed' . PHP_EOL;
		}

		public function __destruct()
		{
			if (self::$verbose)
				echo $this->__toString() . ' destructed' . PHP_EOL;
		}

		public function __toString()
		{
			if (Self::$verbose)
				return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )",
						array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue)));
			return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
		}

		static public function doc()
		{
			return file_get_contents('Vertex.doc.txt');
		}

		public function getX()
		{
			return $this->_x;
		}
		public function setX($x)
		{
			$this->_x = $x;
		}
		public function getY()
		{
			return $this->_y;
		}
		public function setY($y)
		{
			$this->_y = $y;
		}
		public function getZ()
		{
			return $this->_z;
		}
		public function setZ($z)
		{
			$this->_z = $z;
		}
		public function getW()
		{
			return $this->_w;
		}
		public function setW($w)
		{
			$this->_w = $w;
		}
		public function getColor()
		{
			return $this->_color;
		}
		public function setColor($color)
		{
			$this->_color = $color;
		}
	}
?>
