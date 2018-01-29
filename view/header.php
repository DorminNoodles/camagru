<div id="headerContainer">
	<div id="header">
		<div id="mainLogo"><a href="/camagru">Camagru</a>
		</div>
		<div id="loginMenu">
			<div id="btnLoginMenu" onclick=dropDownMenu(true)>+</button>
				<?php include("view/dropDownMenu.php"); ?>
		</div>



		<!-- <?php
			if (!empty($_SESSION['auth']))
				include ('view/logInHeader.php');
			else
				include ('view/logOutHeader.php');
		?> -->
	</div>
</div>
