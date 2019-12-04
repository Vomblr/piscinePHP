#!/usr/bin/php
<?php

function ft_sort($a, $b)
{
	$new_a = strtolower($a);
	$new_b = strtolower($b);
	$i = 0;

	$comp = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	while (($i < strlen($a)) || ($i < strlen($b)))
	{
		$pos_a = strpos($comp, $new_a[$i]);
		$pos_b = strpos($comp, $new_b[$i]);
		if ($pos_a < $pos_b)
			return (-1);
		else if ($pos_a > $pos_b)
			return (1);
		else
			$i++;
	}
}

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
		usort($tab, "ft_sort");
		foreach ($tab as $value)
			echo "$value\n";
	}
?>
