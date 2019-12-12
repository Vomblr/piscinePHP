<?php
	class NightsWatch
	{
		public $fighters = array();
		public function recruit($person)
		{
			if ($person instanceof IFighter)
				$this->fighters[] = $person;
		}
		public function fight()
		{
			foreach($this->fighters as $val)
			$val->fight();
		}
	}
?>
