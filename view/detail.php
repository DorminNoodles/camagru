<div class="detail">

	<div class="photoDetails">
		<img src=<?= $photoPath ?> alt="">
	</div>
	<div class="like">
		<a href="/camagru/detail/<?=$photoId;?>"><?=$likeImg ?></a>
	</div>
	<div class="comments">
		<?
			foreach ($comments as $comment) {
				echo "One comment";
			}
		?>
		<?= $newComment; ?>
	</div>
</div>
