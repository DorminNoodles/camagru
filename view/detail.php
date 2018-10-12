<div class="detail">

	<div class="photoDetails">
		<img src=<?= $photoPath ?> alt="">
	</div>
	<div class="like">
		<a href="/camagru/detail/<?=$photoId;?>"><?=$likeImg ?></a>
	</div>
	<div class="comments">
		<?php
			// print_r($comments);
			foreach ($comments as $comment) {
				// echo '<div class="commentTitle">';
				// echo $comment['title'];
				// echo '</div>';
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
