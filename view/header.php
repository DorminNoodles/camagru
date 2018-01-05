<div>

	<?php
		if (isset($_SESSION['auth']))
			include ('view/logInHeader.php');
		else
			include ('view/logOutHeader.php');
	?>
</div>
