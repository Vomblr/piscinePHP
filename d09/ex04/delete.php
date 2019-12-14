<?php
	foreach ($_GET as $key => $todo)
	{
		$csv = file_get_contents("list.csv");
		$tab = explode("\n", $csv);
		foreach ($tab as $v)
		{
			$tmp = explode(";", $v);
			if ($tmp[1] == $todo)
			{
				$pattern = $tmp[0] . ";" . $tmp[1] . PHP_EOL;
				$csv = str_replace($pattern, "", $csv);
				file_put_contents("list.csv", $csv);
			}
		}
	}
?>
