#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$i = 1;
		$str = NULL;
		while ($i < $argc)
		{
			$str = $str." ".$argv[$i]." ";
			$i++;
		}
		$str_trimmed = trim($str);
		while ((strpos($str_trimmed, "  ")) == true)
			$str_trimmed = str_replace("  ", " ", $str_trimmed);
		$tab = explode(" ", $str_trimmed);
		sort($tab);
		foreach ($tab as $value)
			echo "$value\n";
	}
?>
