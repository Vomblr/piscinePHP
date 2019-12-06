<?php
	if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] == "OK" && file_exists('../private/passwd'))
	{
		$db = unserialize(file_get_contents('../private/passwd'));
		if ($db)
		{
			foreach ($db as $key => $user)
			{
				if ($user['login'] === $_POST['login'] && $user['passwd'] === hash('whirlpool', $_POST['oldpw']))
				{
					$db[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
					file_put_contents('../private/passwd', serialize($db));
					echo "OK\n";
					return(0);
				}
			}
			echo "ERROR\n";
		}
		else
			echo "ERROR\n";
	}
	else
		echo "ERROR\n";
?>
