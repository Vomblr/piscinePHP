<?php
	class Jaime extends Lannister
	{
		public function sleepWith($name)
		{
			if ($name instanceof Tyrion)
				echo $this->no;
			if ($name instanceof Sansa)
				echo $this->let;
			if ($name instanceof Cersei)
				echo $this->with;
		}
	}
?>
