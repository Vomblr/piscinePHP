<?php
	class Tyrion extends Lannister
	{
		public function sleepWith($name)
		{
			if ($name instanceof Jaime)
				echo $this->no;
			if ($name instanceof Sansa)
				echo $this->let;
			if ($name instanceof Cersei)
				echo $this->no;
	}
}
?>
