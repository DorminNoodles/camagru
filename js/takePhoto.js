(function(){


	var sticker = "/camagru/stickers/pika.png";

	var video = document.querySelector('video');

	document.getElementById("takePhoto").onclick = function(e)
	{
		canvas = document.createElement("canvas");
		canvas.id = "canvasPhoto";
		canvas.width = 640;
		canvas.height = 480;
		canvas.getContext('2d').drawImage(video, 0, 0, 640, 480);
		document.getElementById("montage").appendChild(canvas);
		video.parentNode.removeChild(video);
		var takeBtn = document.getElementById("takePhoto");
		takeBtn.parentNode.removeChild(takeBtn);
		var resetBtn = document.createElement("button");
		resetBtn.id = "resetPhoto";
		resetBtn.onclick = resetPhoto;
		resetBtn.appendChild(document.createTextNode("Reset Photo"));

		document.getElementById("btn").appendChild(resetBtn);

		createStickersCanvas();
	}

	function createStickersCanvas()
	{
		canvasPhoto = document.createElement("canvasPhoto");

		canvas = document.createElement("canvas");
		canvas.id = "canvasSticker";
		canvas.width = 640;
		canvas.height = 480;



		document.getElementById("canvasPhoto").appendChild(canvas);

		var img = new Image();
		img.src = sticker;
		canvas.getContext('2d').drawImage(img, 0, 0, 640, 480);

	}

	function resetPhoto(e)
	{
		location.reload();
		// console.log("HELLLLO");
		// canvas = document.getElementById("canvasPhoto");
		// canvas.parentNode.removeChild(canvas);

	}

	if (video)
	{
		navigator.getUserMedia(
			{
				video: true
			},
			function(stream) {
				var vendorURL = window.URL;
				video.src = vendorURL.createObjectURL(stream);
				video.play();
			},
			function(err){
				console.log("NO WEBCAM AVAILABLE");
			}
		);
	}

	// function takePicture()
	// {
	// 	canvas.width = 640;
	// 	canvas.height = 480;
	// 	var photo = new Image();
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
