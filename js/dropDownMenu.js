var showMenu = false;
var openMenu = false;

document.addEventListener('mousedown', function(e){

	// console.log(e.srcElement.id);
	// if (showMenu)
	// {
	// 	showMenu = false;
	// 	document.getElementById("dropDownMenu").style.visibility = "hidden";
	// }

	if (e.srcElement.id == "btnLoginMenu")
	{
		console.log("here");
		if (!showMenu)
		{
			document.getElementById("dropDownMenu").style.visibility = "visible";
			showMenu = true;
			console.log("visible");
		}
		else
		{
			showMenu = false;
			document.getElementById("dropDownMenu").style.visibility = "hidden";
			console.log("hidden");
		}
	}
});

function dropDownMenu(create)
{
	// console.log("dropDownMenu : " + create);
	// // if(showMenu)
	// // {
	// // 	// var elem = document.getElementById("dropDownMenu");
	// // 	// elem.remove();
	// // 	document.getElementById("dropDownMenu").style.visibility = "hidden";
	// // 	showMenu = false;
	// // }
    //
	// if(create)
	// {
	// 	document.getElementById("dropDownMenu").style.visibility = "visible";
	// 	showMenu = true;
	// 	// var menu = document.createElement("div");
	// 	// menu.id = "dropDownMenu";
	// 	// // menu.style.background.color = "#996611";
	// 	// // menu.width = "200px";
	// 	// // menu.height = "200px";
    //     //
	// 	// document.getElementById("loginMenu").appendChild(menu);
	// }
}
