#!/usr/bin/php
<?php
	if ($argc >= 3)
	{
		$key = $argv[1];
		unset($argv[0], $argv[1]);
		$argv = array_reverse($argv);
		foreach ($argv as $value)
		{
			$tmp = explode(":", $value);
			if ($key === $tmp[0])
			{
				echo $tmp[1]."\n";
				exit();
			}
		}
	}
	else
		exit();
?>
