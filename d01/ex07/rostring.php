#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$str = $argv[1];
		while ((strpos($str, "  ")) == true)
			$str = str_replace("  ", " ", $str);
		$tab = explode(" ", $str);
		$word_num = count($tab);
		$i = 1;
		while ($i < $word_num)
		{
			echo ($tab[$i]." ");
			$i++;
		}
		echo ($tab[0]."\n");
	}
?>
