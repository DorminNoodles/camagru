<div id="gallery">
	<?php
		foreach ($photos as $photo)
		{
			echo'<div class="divPhoto">';
			echo '<a href="/camagru/home/photo">';
			echo '<img class="photo" src="'. $photo['path'] .'">';
			echo '</a>';
			echo '</div>';
		}
	?>

</div>
<div id="btnGallery">
	<a href=<?= $previousPage; ?>><button>precedent</button>
	<a href=<?= $nextPage; ?>><button>suivant</button>
</div>
