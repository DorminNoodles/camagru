var showMenu = false;

document.addEventListener('mousedown', function(e){
	// console.log(e.target);
	dropDownMenu(false);
});

function dropDownMenu(create)
{
	if(showMenu)
	{
		// var elem = document.getElementById("dropDownMenu");
		// elem.remove();
		document.getElementById("dropDownMenu").style.visibility = "hidden";
		showMenu = false;
	}
	else if(create)
	{
		document.getElementById("dropDownMenu").style.visibility = "visible";
		showMenu = true;
		// var menu = document.createElement("div");
		// menu.id = "dropDownMenu";
		// // menu.style.background.color = "#996611";
		// // menu.width = "200px";
		// // menu.height = "200px";
        //
		// document.getElementById("loginMenu").appendChild(menu);
	}
}
