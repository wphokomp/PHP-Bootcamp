
function refresh()
{
	var list = document.getElementById("ft_list");
	var cook = document.cookie;
	var array = cook.split(';');
	if (array)
	{	
		for (var i = 0; i < array.length; i++)
		{
			var item = document.createElement("div");
			var node = document.createTextNode(array[i]);
			item.setAttribute("id", i);
			item.setAttribute("onclick", "remove(this.id)");
			item.appendChild(node);
			list.appendChild(item);
		}
	}
}

function remove(id)
{
	var cook = document.cookie;
	var array = cook.split(";");
	var newArr = array.splice(id, 1);
	var newCook = "";

	for (var i = 0; i < newArr.length; i++)
	{
		newCook = newCook + newArr[i] + ";";
	}
	document.cookie = newCook;
	refresh();
}

function add()
{
	var todo = prompt("TO DO", "Add todo");

	if (todo != null)
	{
		var cook = document.cookie;
		var newCook = "text="+todo + ", expires=2017";
		document.cookie = "username=John Smith, expires=18 Dec 2017 12:00:00 UTC, path=/";
		console.log(newCook);
		console.log(document.cookie);
	}
	refresh();
}
