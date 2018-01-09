<div>

	<?php

		if ($_SESSION['auth'])
			include ('view/logInHeader.php');
		else
			include ('view/logOutHeader.php');
	?>
</div>
