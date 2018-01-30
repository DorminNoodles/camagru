<div id="gallery">
	<?php
		foreach($this->render['gallery'] as $photo)
		{
			echo'<div class="divPhoto"><img class="photo" src="'. $photo['path'] .'"></div>';
		}
	?>

</div>
<div id="btnGallery">
	<a href=<?= $this->render['btnPreviousPage']?>><button>precedent</button>
	<a href=<?= $this->render['btnNextPage']?>><button>suivant</button>
</div>
