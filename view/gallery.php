<div id="gallery">
	<?php
		foreach($this->render['gallery'] as $photo)
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
	<a href=<?= $this->render['btnPreviousPage']?>><button>precedent</button>
	<a href=<?= $this->render['btnNextPage']?>><button>suivant</button>
</div>
