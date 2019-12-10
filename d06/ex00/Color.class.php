<?php
	class Color
	{
		public	$red;
		public	$green;
		public	$blue;
		static	$verbose = false;

		public function __construct($color)
		{
			if (isset($color['red']) && isset($color['green']) && isset ($color['blue']))
			{
				$this->red = intval($color['red']);
				$this->green = intval($color['green']);
				$this->blue = intval($color['blue']);
			}
			else if (isset($color['rgb']))
			{
				$rgb = intval($color['rgb']);
				$this->red = $rgb / 256 / 256 % 256;
				$this->green = $rgb / 256 % 256;
				$this->blue = $rgb % 256;
			}
			if (Self::$verbose)
				echo $this->__toString() . " constructed." . PHP_EOL;
		}

		public function __destruct()
		{
			if (Self::$verbose)
				echo $this->__toString() . " destructed." . PHP_EOL;
		}

		function __toString()
		{
			return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
		}

		static public function doc()
		{
			return file_get_contents('Color.doc.txt');
		}

		public function add($Color)
		{
			return (new Color(array('red' => $this->red + $Color->red,
									'green' => $this->green + $Color->green,
									'blue' => $this->blue + $Color->blue)));
		}

		public function sub($Color)
		{
			return (new Color(array('red' => $this->red - $Color->red,
									'green' => $this->green - $Color->green,
									'blue' => $this->blue - $Color->blue)));
		}

		public function mult($mult)
		{
			return (new Color(array('red' => $this->red * $mult,
									'green' => $this->green * $mult,
									'blue' => $this->blue * $mult)));
		}


	}
?>
