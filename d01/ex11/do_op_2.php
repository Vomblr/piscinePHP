#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		if (strpos($argv[1], "*") !== false)
			$tab = explode("*", $argv[1]);
		else if (strpos($argv[1], "/") !== false)
			$tab = explode("/", $argv[1]);
		else if (strpos($argv[1], "%") !== false)
			$tab = explode("%", $argv[1]);
		else if (strpos($argv[1], "+") !== false)
			$tab = explode("+", $argv[1]);
		else if (strpos($argv[1], "-") !== false)
			$tab = explode("-", $argv[1]);
		else
		{
			echo "Syntax Error\n";
			exit();
		}
		if (count($tab) != 2)
		{
			echo "Syntax Error\n";
			exit();
		}
		else
		{
			foreach ($tab as $value)
				$tab2[] = trim($value);
			if (is_numeric($tab2[0]) && is_numeric($tab2[1]))
			{
				if (strpos($argv[1], "*") !== false)
					echo ($tab2[0] * $tab2[1]);
				if (strpos($argv[1], "/") !== false)
					echo ($tab2[0] / $tab2[1]);
				if (strpos($argv[1], "%") !== false)
					echo ($tab2[0] % $tab2[1]);
				if (strpos($argv[1], "+") !== false)
					echo ($tab2[0] + $tab2[1]);
				if (strpos($argv[1], "-") !== false)
					echo ($tab2[0] - $tab2[1]);
				echo "\n";
			}
			else
				echo "Syntax Error\n";
		}
	}
	else
	{
		echo "Incorrect Parameters\n";
		exit();
	}
?>
