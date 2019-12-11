<?php
	class Camera
	{
		public static $verbose = false;
		private $_origin;
		private $_tT;
		private $_tR;
		private $_width;
		private $_height;
		private $_ratio;
		private $_proj;

		public function __construct($array)
		{
			$this->_origin = $array['origin'];
			$this->_tT = new Matrix(array('preset' => Matrix::TRANSLATION, 'vtc' => $this->_origin->opposite()));
			$this->_tR = $this->_transpose($array['orientation']);
			$this->_width = (!$this->_ratio) ? (float)$array['width'] : 0;
			$this->_height = (!$this->_ratio) ? (float)$array['height'] : 0;
			$this->_ratio = (!$this->_width && !$this->_height) ? $array['ratio'] : ($this->_width / $this->_height);
			$this->_proj = new Matrix(array(
											'preset' => Matrix::PROJECTION,
											'fov' => $array['fov'],
											'ratio' => $this->_ratio,
											'near' => $array['near'],
											'far' => $array['far']));
			if (Self::$verbose)
				echo "Camera instance constructed\n";
		}

		public function __destruct()
		{
			if (Self::$verbose)
				echo "Camera instance destructed\n";
		}

		public function __toString()
		{
			$tmp = "Camera( \n";
			$tmp .= "+ Origin: ".$this->_origin."\n";
			$tmp .= "+ tT:\n".$this->_tT."\n";
			$tmp .= "+ tR:\n".$this->_tR."\n";
			$tmp .= "+ tR->mult( tT ):\n".$this->_tR->mult($this->_tT)."\n";
			$tmp .= "+ Proj:\n".$this->_proj."\n)";
			return ($tmp);
		}

		public static function doc()
		{
			return file_get_contents('Camera.doc.txt');
		}

		private function _transpose(Matrix $m)
		{
			$tmp[0] = $m->matrix[0];
			$tmp[1] = $m->matrix[4];
			$tmp[2] = $m->matrix[8];
			$tmp[3] = $m->matrix[12];
			$tmp[4] = $m->matrix[1];
			$tmp[5] = $m->matrix[5];
			$tmp[6] = $m->matrix[9];
			$tmp[7] = $m->matrix[13];
			$tmp[8] = $m->matrix[2];
			$tmp[9] = $m->matrix[6];
			$tmp[10] = $m->matrix[10];
			$tmp[11] = $m->matrix[14];
			$tmp[12] = $m->matrix[3];
			$tmp[13] = $m->matrix[7];
			$tmp[14] = $m->matrix[11];
			$tmp[15] = $m->matrix[15];
			$m->matrix = $tmp;
			return ($m);
		}

		public function watchVertex(Vertex $worldVertex)
		{
			$tmp = $this->_proj->transformVertex($this->_tR->transformVertex($worldVertex));
			return (new Vertex(array(
									'x' => $tmp->getX() * $this->_ratio,
									'y' => $tmp->getY(),
									'z' => $tmp->getZ(),
									'color' => $tmp->getColor())));
		}

		public function getOrigin()
		{
			return $this->_origin;
		}
		public function setOrigin($origin)
		{
			$this->_origin = $origin;
		}
		public function getOrientation()
		{
			return $this->_tR;
		}
		public function setOrientation($tR)
		{
			$this->_tr = $tR;
		}
		public function getWidth()
		{
			return $this->_width;
		}
		public function setWidth($width)
		{
			$this->_width = $width;
		}
		public function getHeight()
		{
			return $this->_height;
		}
		public function setHeight($height)
		{
			$this->_height = $height;
		}
		public function getRatio()
		{
			return $this->_ratio;
		}
		public function setRatio($ratio)
		{
			$this->_ratio = $ratio;
		}
		public function getProjectionMatrix()
		{
			return $this->_proj;
		}
		public function setProjectionMatrix($proj = array('fov' , 'near', 'far'))
		{
			$this->_proj['fov'] = $proj['fov'];
			$this->_proj['near'] = $proj['near'];
			$this->_proj['far'] = $proj['far'];
		}
	}
?>
