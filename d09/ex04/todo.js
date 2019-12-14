//var id = Math.floor(Math.random() * Math.floor(2147483648));
var id = 0;

$.ajax(
	{
		type: "GET",
		url: "select.php",
		success: function (result)
		{
			var tab =  JSON.parse(result);
			if (tab && tab[0] != '')
			{
				for (i = 0; i < tab.length; i++)
				{
					var tmp = tab[i].split(';');
					addtoCSV(tmp[1]);
					id = Number(tmp[0]);
					console.log(tmp[0]);
				}
			}
			//id = Number(tmp[0]);
			console.log(id);
		}
	})

	function addtoCSV(todo)
	{
		if (todo)
			$("#ft_list").prepend($('<div>' + todo + '</div>').click(removeTodo));
	}

	$("#submit").click(function()
	{
		var todo = prompt("What are you going to do?");
		if (todo)
		{
			addtoCSV(todo);
			$.ajax(
			{
				type: "GET",
				url: "insert.php?" + id + "=" + todo
			});
			id++;
			//id = Math.floor(Math.random() * Math.floor(2147483648));
		}

	})

	function removeTodo()
	{
		var todo;
		if (confirm("Remove this item?"))
		{
			todo = $(this).text();
			$(this).remove();
			$.ajax(
			{
				type: "GET",
				url: "delete.php?" + id + "=" + todo
			});
		}
	}
