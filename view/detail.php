<div class="detail">

	<div class="photoDetails">
		<img src=<?= $photoPath ?> alt="">
	</div>
	<div class="like">
		<a href="/camagru/detail/<?=$photoId;?>"><?=$likeImg ?></a>
	</div>
	<div class="comments">
		<?php
			foreach ($comments as $comment) {
				echo '<br/>';
				echo '<div class="commentLogin">';
				echo $comment['login'];
				echo '</div>';
				echo '<div class="commentMessage">';
				echo $comment['message'];
				echo '</div>';
				echo '<hr/>';
			}
		?>
		<?= $newComment; ?>
	</div>
</div>
