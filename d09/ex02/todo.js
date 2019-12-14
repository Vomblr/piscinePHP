function checkCookies()
{
	var tab =  document.cookie.split(';');
	if (tab && tab[0] != '')
	{
		for (i = 0; i < tab.length; i++)
		{
			tmp = tab[i].split('=');
			addCookie(tmp[1]);
		}
	}
}

function addCookie(todo)
{
	if (todo)
	{
		var div = document.createElement("div");
		div.innerHTML = todo;
		div.addEventListener("click", removeTodo);
		var list = document.getElementById("ft_list");
		list.insertBefore(div, list.childNodes[0]);
		document.cookie = todo + '=' + todo + ';';
	}
}

function addTodo()
{
	var todo = prompt("What are you going to do?");
	if (todo)
		addCookie(todo);
}

function removeTodo()
{
	if (confirm("Remove this item?"))
	{
		this.remove();
		document.cookie = this.innerHTML + "=; expires=Thu, 12 Dec 2019 00:00:00 GMT;";
	}
}
