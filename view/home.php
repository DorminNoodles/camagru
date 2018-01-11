<!DOCTYPE html>
<body>
<?php include 'view/header.php';?>
<div class="null">
	<h1>Bienvenue</h1>
	<p>It s the homepage</p>

	<!-- <input type="file" accept="image/*" capture="camera"> -->
	<!-- <input type="file" accept="video/*;capture=camcorder"> -->
</div>
<video autoplay></video>


<button id="startbutton">Prendre une photo</button>
<canvas id="canvas"></canvas>
<!-- <img src="http://placekitten.com/g/320/261" id="photo" alt="photo"> -->
<button id="savebutton">Sauvegarder image</button>

<script>
	(function(){

		var streaming = false,
			photo		= document.querySelector('photo'),
			video		= document.querySelector('video');

		navigator.getUserMedia(
			{
				video: true,
				audio: false
			},
			function(stream) {
				var vendorURL = window.URL;
				video.src = vendorURL.createObjectURL(stream);
				video.play();
			},
			function(err){
				console.log("Error haaaa");
			}
		);

		function takepicture()
		{
			canvas.width = 640;
			canvas.height = 480;
			canvas.getContext('2d').drawImage(video, 0, 0, 640, 480);
			var data = canvas.toDataURL('image/png');
			//photo.setAttribute('src', data);
		}

		startbutton.addEventListener('click', function(ev)
		{
			takepicture();
			ev.preventDefault();
		}, false);

		savebutton.addEventListener('click', function(ev)
		{
		}, false);

	})()

</script>

</body>
