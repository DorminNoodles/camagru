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

		var data;

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
			data = canvas.toDataURL('image/png');
			//photo.setAttribute('src', data);
		}

		function post(path, params, method)
		{
			var form = document.createElement("form");
			form.setAttribute("method", "post");
			form.setAttribute("action", path);

			var hiddenField = document.createElement("input");
			hiddenField.setAttribute("type", "hidden");
			hiddenField.setAttribute("name", "saveimg");
			hiddenField.setAttribute("value", params);

			form.appendChild(hiddenField);
			document.body.appendChild(form);
			form.submit();
		}

		startbutton.addEventListener('click', function(ev)
		{
			takepicture();
			ev.preventDefault();
		}, false);

		savebutton.addEventListener('click', function(ev)
		{
			var test = 5;
			// alert(data);
			post("/camagru/home/saveimg", data, "post");
		}, false);

	})()

</script>

</body>
