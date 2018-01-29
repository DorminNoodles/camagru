<!DOCTYPE html>
<link rel="stylesheet" href="/camagru/css/style.css" type="text/css" media="screen" />
<body>
<script src="/camagru/js/dropDownMenu.js"></script>
<?php include 'view/header.php';?>

<!-- <div class="null">
	<h1>Bienvenue</h1>
	<p>It s the homepage</p>

	<!-- <input type="file" accept="image/*" capture="camera"> -->
	<!-- <input type="file" accept="video/*;capture=camcorder"> -->
</div>
<div id="contentContainer">
	<div id="content">
		<div id="gallery">
			<?php
				foreach($vars['gallery'] as $photo)
				{
					echo'<div class="divPhoto"><img class="photo" src="'. $photo['path'] .'"></div>';
				}
			?>

			<div id="btnGallery">
				<a href=<?= $vars['btnNextPage']?>><button>suivant</button>
			</div>
	</div>
</div>

</body>
