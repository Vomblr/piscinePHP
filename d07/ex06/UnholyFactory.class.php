<?php
	class UnholyFactory
	{
		public $types = Array();

		public function absorb($fighter)
		{
			if (!($fighter instanceof Fighter))
			{
				echo "(Factory can't absorb this, it's not a fighter)" . PHP_EOL;
				return false;
			}

			if (isset($this->types[$fighter->type]))
			{
				echo "(Factory already absorbed a fighter of type {$fighter->type})" . PHP_EOL;
				return false;
			}
			echo "(Factory absorbed a fighter of type {$fighter->type})" . PHP_EOL;
			$this->types[$fighter->type] = $fighter;
			return true;
		}

		public function fabricate($type)
		{
			foreach ($this->types as $key) {
				if ($key->type == $type)
				{
					print("(Factory fabricates a fighter of type " . $type . ")" . PHP_EOL);
					return clone $key;
				}
			}
			print("(Factory hasn't absorbed any fighter of type " . $type . ")" . PHP_EOL);
			return false;
		}
	}
?>
