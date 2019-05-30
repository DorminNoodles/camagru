<div id="headerContainer">
	<div id="header">
		<div id="mainLogo"><a href="/camagru/home">Camagru</a></div>
		<div class="headerLink"><a href="/camagru/Editing">Editing</a></div>
		<?php
			if (!isset($_SESSION['id']))
				echo '<div class="headerLink"><a href="/camagru/Register">Register</a></div>';
			if (isset($_SESSION['id']))
				echo '<div class="headerLink"><a href="/camagru/MyProfile">Profile</a></div>';
		 	if (!isset($_SESSION['id']))
				echo '<div class="headerLink"><a href="/camagru/Login">Login</a></div>';
			else
				echo '<div class="headerLink"><a href="/camagru/Logout">Logout</a></div>';
		?>
	</div>
</div>
