<?php
	foreach ($_GET as $key => $todo)
		file_put_contents("list.csv", $key . ";" . $todo . "\n", FILE_APPEND);
?>
