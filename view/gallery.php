<div id="gallery">
	<?php
		foreach ($photos as $photo)
		{
			echo'<div class="divPhoto">';
			echo '<a href="/camagru/detail/' . $photo['id'] . '">';
			echo '<img class="photo" src="'. $photo['path'] .'">';
			echo '</a>';
			echo '</div>';
		}
	?>

</div>
<div id="btnGallery">
	<a href=<?= $previousPage; ?>><button>precedent</button></a>
	<a href=<?= $nextPage; ?>><button>suivant</button></a>
</div>
