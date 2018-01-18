(function(){

	var data;
	// var sticker = "/camagru/stickers/pika.png";

	// Grab elements, create settings, etc.
	var video = document.getElementById('video');

	// Get access to the camera!
	// if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
	// {
	// 	// Not adding `{ audio: true }` since we only want video now
	// 	navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream)
	// 	{
	// 		video.src = window.URL.createObjectURL(stream);
	// 		video.play();
	// 	});
	// }
	// document.getElementById("takePhoto").onclick = function(e)
	// {
	// 	var form = document.createElement("form");
	// 	form.setAttribute("method", "post");
	// 	form.setAttribute("action", "/camagru/montage");
    //
	// 	var hiddenField = document.createElement("input");
	// 	hiddenField.setAttribute("type", "hidden");
	// 	hiddenField.setAttribute("name", "photo");
	// 	hiddenField.setAttribute("value", "tamere");
    //
	// 	form.appendChild(hiddenField);
    //
	// 	document.body.appendChild(form);
	// 	form.submit();
	// }

	navigator.getUserMedia(
		{
			video: true
		},
		function(stream) {
			console.log("here");
			var vendorURL = window.URL;
			video.src = vendorURL.createObjectURL(stream);
			video.play();

		},
		function(err){
			console.log("Error haaaa");
		}
	);

	// function takepicture()
	// {
	// 	canvas.width = 640;
	// 	canvas.height = 480;
	// 	var img = new Image();
	// 	// img.src = './photos/pika_hat.png';
	// 	canvas.getContext('2d').drawImage(video, 0, 0, 640, 480);
	// 	// canvas.getContext('2d').drawImage(img, 0, 0, 640, 480);
	// 	data = canvas.toDataURL('image/png');
	// 	//photo.setAttribute('src', data);
	// }

	// function post(path, params, method)
	// {
	// 	var form = document.createElement("form");
	// 	form.setAttribute("method", "post");
	// 	form.setAttribute("action", path);
    //
	// 	var hiddenField = document.createElement("input");
	// 	hiddenField.setAttribute("type", "hidden");
	// 	hiddenField.setAttribute("name", "saveimg");
	// 	hiddenField.setAttribute("value", params);
    //
	// 	form.appendChild(hiddenField);
	// 	document.body.appendChild(form);
	// 	form.submit();
	// }

	// document.getElementById("canvas").onclick = function(e)
	// {
    //
	// 	// console.log(e.pageX - this.offsetLeft);
	// 	// console.log(e.pageY - this.offsetTop);
    //
	// 	canvas.getContext('2d');
	// 	var img = new Image();
	// 	img.src = sticker;
	// 	console.log(img.width);
	// 	console.log(img.height);
	// 	canvas.getContext('2d').drawImage(img, (e.pageX - this.offsetLeft) - (img.width / 2), (e.pageY - this.offsetTop) - (img.height / 2) );
	// 	data = canvas.toDataURL('image/png');
	// 	// canvas.getContext('2d');
	// };

	// startbutton.addEventListener('click', function(ev)
	// {
	// 	// takepicture();
	// 	// ev.preventDefault();
	// }, false);
    //
	// savebutton.addEventListener('click', function(ev)
	// {
	// 	post("/camagru/montage/saveimg", data, "post");
	// }, false);

})()
