<?php
	function ft_split($string)
	{
		$test = explode(" ", $string);
		$res = array_filter($test, 'strlen');
		sort($res);
		return($res);
	}
?>
