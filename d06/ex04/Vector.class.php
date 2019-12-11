<?php
	class Vector
	{
		private $_x;
			private $_y;
			private $_z;
			private $_w = 0.0;
			static $verbose = false;

		public function __construct($array)
		{
			if (isset($array['dest']) && $array['dest'] instanceof Vertex)
			{
				if (!(isset($array['orig']) && $array['orig'] instanceof Vertex))
					$array['orig'] = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));

			}
			$this->_x = $array['dest']->getX() - $array['orig']->getX();
			$this->_y = $array['dest']->getY() - $array['orig']->getY();
			$this->_z = $array['dest']->getZ() - $array['orig']->getZ();
			if (Self::$verbose)
				echo $this->__toString() . ' constructed' . PHP_EOL;
		}

		public function __destruct()
		{
			if (Self::$verbose)
				echo $this->__toString() . ' destructed' . PHP_EOL;
		}

		public function __toString()
		{
			return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
		}

		static public function doc()
		{
			return file_get_contents('Vector.doc.txt');
		}

		public function magnitude()
		{
			return sqrt($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z);
		}

		public function normalize()
		{
			$lenght = $this->magnitude();
			if ($lenght == 1)
				return clone $this;
			return new Vector(array('dest' =>
					new Vertex(array('x' => $this->_x / $lenght, 'y' => $this->_y / $lenght, 'z' => $this->_z / $lenght))));
		}

		public function add(Vector $rhs)
		{
			$x = $this->_x + $rhs->getX();
			$y = $this->_y + $rhs->getY();
			$z = $this->_z + $rhs->getZ();
			return new Vector(['dest' => new Vertex(compact('x', 'y', 'z'))]);
		}

		public function sub(Vector $rhs)
		{
			$x = $this->_x - $rhs->getX();
			$y = $this->_y - $rhs->getY();
			$z = $this->_z - $rhs->getZ();
			return new Vector(['dest' => new Vertex(compact('x', 'y', 'z'))]);
		}

		public function opposite()
		{
			$x = -1 * $this->_x;
			$y = -1 * $this->_y;
			$z = -1 * $this->_z;
			return new Vector(['dest' => new Vertex(compact('x', 'y', 'z'))]);
		}

		public function scalarProduct($k)
		{
			$x = $this->_x * $k;
			$y = $this->_y * $k;
			$z = $this->_z * $k;
			return new Vector(['dest' => new Vertex(compact('x', 'y', 'z'))]);
		}

		public function dotProduct(Vector $rhs)
		{
			return ($this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->_z * $rhs->getZ());
		}

		public function cos(Vector $rhs)
		{
			return ($this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude()));
		}

		public function crossProduct(Vector $rhs)
		{
			$x = $this->_y * $rhs->getZ() - $rhs->getY() * $this->_z;
			$y = $this->_z * $rhs->getX() - $this->_x * $rhs->getZ();
			$z = $this->_x * $rhs->getY() - $this->_y * $rhs->getX();
			return new Vector(['dest' => new Vertex(compact('x', 'y', 'z'))]);
		}

		public function getX()
		{
			return $this->_x;
		}
		public function getY()
		{
			return $this->_y;
		}
		public function getZ()
		{
			return $this->_z;
		}
		public function getW()
		{
			return $this->_w;
		}
	}
?>
