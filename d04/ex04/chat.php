<?php
	session_start();
	if ($_SESSION["loggued_on_user"] && $_SESSION["loggued_on_user"] !== "")
	{
		if (!file_exists('../private'))
			mkdir('../private');
		if (!file_exists('../private/chat'))
			file_put_contents('../private/chat', null);
		$db = unserialize(file_get_contents('../private/chat'));
		$i = 0;
		while ($db[$i])
		{
			echo "[" . $db[$i]['date'] . "] " . "<b>" . $db[$i]['login'] ."</b>" .": ";
			echo $db[$i]['msg'];
			echo "<br />"."\n";
			$i++;
		}
	}
	else
		echo "ERROR\n";
?>
