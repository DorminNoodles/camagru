(function(){

	// var data;
	// var sticker = "/camagru/stickers/pika.png";

	var video = document.querySelector('video');

	document.getElementById("takePhoto").onclick = function(e)
	{
		canvas = document.createElement("canvas");
		canvas.width = 640;
		canvas.height = 480;
		// canvas.video
		canvas.getContext('2d').drawImage(video, 0, 0, 640, 480);
		// data = canvas.toDataURL('image/png');
		// console.log( data);
		// document.body.appendChild(form);
		// divMontage = document.getElementById("montage");
		document.body.appendChild(canvas);
		video.parentNode.removeChild(video);
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
