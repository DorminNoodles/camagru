<div id="montage">
	<video autoplay="true"></video>
</div>
<div class="btn">
	<button id="takePhoto">Prendre une photo</button>
</div>
<input type="file" id="imageLoader" name="imageLoader"/>
<div class="btn">
	<label id="labelLoader" for="imageLoader">Choose a file</label>
</div>

<div id="menuStickers" style="display:none">
	<img id="pika" src="/camagru/stickers/pika.png" onclick="instanceSticker('pika.png')">
	<img id="homer" src="/camagru/stickers/homer.png" onclick="instanceSticker('homer.png')">
	<img id="firefox" src="/camagru/stickers/firefox.png" onclick="instanceSticker('firefox.png')">
	<img id="licorne" src="/camagru/stickers/licorne.png" onclick="instanceSticker('licorne.png')">
	<img id="dog" src="/camagru/stickers/dog.png" onclick="instanceSticker('dog.png')">
	<img id="bonnet" src="/camagru/stickers/bonnet.png" onclick="instanceSticker('bonnet.png')">
	<img id="casquette" src="/camagru/stickers/casquette.png" onclick="instanceSticker('casquette.png')">
	<img id="apple" src="/camagru/stickers/apple.png" onclick="instanceSticker('apple.png')">
</div>
<!-- <div id="box-shadow-div" ></div> -->
<script src="/camagru/js/takePhoto.js">
</script>
