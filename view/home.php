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

<script>

	function error(err)
	{
		console.log("error : " + err.name);
	}

	function test (stream)
	{
		var video = document.querySelector('video');
		video.src = window.URL.createObjectURL(stream);
		// video.onloadedmetadata
	}

if (navigator.getUserMedia)
{

	navigator.getUserMedia({audio: false, video: true}, test, error);
}
else
{
	console.log("getUserMedia not supported");
}




// Not showing vendor prefixes.
// navigator.getUserMedia({video: true, audio: false}, function(localMediaStream) {
//   var video = document.querySelector('vide');
//   video.src = window.URL.createObjectURL(localMediaStream);
//
//   // Note: onloadedmetadata doesn't fire in Chrome when using it with getUserMedia.
//   // See crbug.com/110938.
//   video.onloadedmetadata = function(e) {
// 	// Ready to go. Do some stuff.
//   };
// }, errorCallback);



</script>

</body>
