<?php
	session_start();
	date_default_timezone_set('Europe/Moscow');
	if ($_SESSION["loggued_on_user"] && $_SESSION["loggued_on_user"] != "")
	{
		if (!file_exists('../private'))
			mkdir('../private');
		if (!file_exists('../private/chat'))
			file_put_contents('../private/chat', null);
		$file = fopen("../private/chat", "r+");
		if (flock($file, LOCK_EX))
		{
			$db = unserialize(file_get_contents('../private/chat'));
			$i = 0;
			while ($db[$i])
				$i++;
			if ($_POST['msg'])
			{
				$tmp['login'] = $_SESSION["loggued_on_user"];
				$tmp['date'] = date('H:i');
				$tmp['msg'] = $_POST['msg'];
				$db[$i] = $tmp;
			}
			$write_msg = serialize($db);
			file_put_contents("../private/chat", $write_msg);
			flock($file, LOCK_UN);
		}
	}
	else
	{
		echo "ERROR\n";
		exit;
	}
?>
<html>
<head><script langage="javascript">top.frames['chat'].location = 'chat.php';</script></head>
<body>
	<form method="post" action="./speak.php">
	<input type="text" name="msg">
	<input type="submit" name="submit" value="OK">
	</form>
</body>
</html>
