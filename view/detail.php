<div class="detail">


		<img src=<?= $photoPath ?> alt="">

	<div class="like">
		<a href="/camagru/detail/<?=$photoId;?>"><img src=<?= $likeImg ?> alt=""></a>
	</div>
	<div class="comments">
		<?
			foreach ($comments as $comment) {
				echo "One comment";
			}
		?>
	</div>
</div>
