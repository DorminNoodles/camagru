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
<img src="http://placekitten.com/g/320/261" id="photo" alt="photo">

<script>
    //
	// function error(err)
	// {
	// 	console.log("error : " + err.name);
	// }
    //
	// function test (stream)
	// {
	// 	var video = document.querySelector('video');
	// 	video.src = window.URL.createObjectURL(stream);
	// 	// video.onloadedmetadata
	// }
    //
	// if (navigator.getUserMedia)
	// {
    //
	// 	navigator.getUserMedia({audio: false, video: true}, test, error);
	// }
	// else
	// {
	// 	console.log("getUserMedia not supported");
	// }

	// alert('alert a la bite');

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


		// var test = navigator.mediaDevices;
		// var test = navigator.mediaDevices.getUserMedia();
		// console.log(test);

		function takepicture()
		{
			canvas.width = 640;
			canvas.height = 480;
			canvas.getContext('2d').drawImage(video, 0, 0, 640, 480);
			var data = canvas.toDataURL('image/png');
			/photo.setAttribute('src', data);
		}

		startbutton.addEventListener('click', function(ev)
		{
			takepicture();
			ev.preventDefault();
		}, false);


	})()


</script>

</body>
