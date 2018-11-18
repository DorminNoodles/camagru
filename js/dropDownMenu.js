var showMenu = false;
var openMenu = false;

document.addEventListener('mousedown', function(e){

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
