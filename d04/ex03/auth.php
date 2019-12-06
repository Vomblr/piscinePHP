<?php
	function auth($login, $passwd)
	{
		if ($login && $passwd)
		{
			$hashed_pwd = hash('whirlpool', $passwd);
			$db = unserialize(file_get_contents('../private/passwd'));
			if ($db)
			{
				foreach($db as $key => $user)
				{
					if ($user['login'] === $login && $user['passwd'] === $hashed_pwd)
						return (TRUE);
				}
			}
		}
		return (FALSE);
	}
?>
