<div>
	<?php
		if (!empty($_SESSION['auth']))
			include ('view/logInHeader.php');
		else
			include ('view/logOutHeader.php');
	?>
</div>
