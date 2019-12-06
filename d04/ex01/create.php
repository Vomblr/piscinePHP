<?php
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] == "OK")
	{
		if (!file_exists('../private'))
            mkdir('../private');
        if (!file_exists('../private/passwd'))
			file_put_contents('../private/passwd', NULL);
		$db = unserialize(file_get_contents('../private/passwd'));
		if ($db)
		{
			foreach($db as $key => $user)
			{
				if ($user['login'] === $_POST['login'])
				{
					echo "ERROR\n";
					return (0);
				}
			}
		}
		$tmp['login'] = $_POST['login'];
		$tmp['passwd'] = hash('whirlpool', $_POST['passwd']);
		$db[] = $tmp;
		file_put_contents('../private/passwd', serialize($db));
		echo "OK\n";
	}
	else
		echo "ERROR\n"
?>
