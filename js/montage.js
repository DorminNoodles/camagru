(function(){

	var data;
	var sticker = "/camagru/stickers/pika.png";

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
		var img = new Image();
		// img.src = './photos/pika_hat.png';
		canvas.getContext('2d').drawImage(video, 0, 0, 640, 480);
		// canvas.getContext('2d').drawImage(img, 0, 0, 640, 480);
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

	document.getElementById("canvas").onclick = function(e)
	{

		// console.log(e.pageX - this.offsetLeft);
		// console.log(e.pageY - this.offsetTop);

		canvas.getContext('2d');
		var img = new Image();
		img.src = sticker;
		console.log(img.width);
		console.log(img.height);
		canvas.getContext('2d').drawImage(img, (e.pageX - this.offsetLeft) - (img.width / 2), (e.pageY - this.offsetTop) - (img.height / 2) );
		data = canvas.toDataURL('image/png');
		// canvas.getContext('2d');
	};

	document.getElementById("pika").onclick = function(e)
	{
		sticker = "/camagru/stickers/pika.png";
	}

	document.getElementById("homer").onclick = function(e)
	{
		sticker = "/camagru/stickers/homer.png";
	}

	document.getElementById("firefox").onclick = function(e)
	{
		sticker = "/camagru/stickers/firefox.png";
	}
	document.getElementById("dog").onclick = function(e)
	{
		sticker = "/camagru/stickers/dog.png";
	}
	document.getElementById("bonnet").onclick = function(e)
	{
		sticker = "/camagru/stickers/bonnet.png";
	}
	document.getElementById("casquette").onclick = function(e)
	{
		sticker = "/camagru/stickers/casquette.png";
	}
	document.getElementById("licorne").onclick = function(e)
	{
		sticker = "/camagru/stickers/licorne.png";
	}
	document.getElementById("apple").onclick = function(e)
	{
		sticker = "/camagru/stickers/apple.png";
	}


	startbutton.addEventListener('click', function(ev)
	{
		takepicture();
		ev.preventDefault();
	}, false);

	savebutton.addEventListener('click', function(ev)
	{
		post("/camagru/montage/saveimg", data, "post");
	}, false);

})()
