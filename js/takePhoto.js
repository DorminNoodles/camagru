//  window.addEventListener('mousemove', function(event){
// 	 console.log("fuck");
// 	 var follow = document.getElementById("box-shadow-div");
// 	 if (follow)
// 	 {
// 	 	follow.style.left = event.clientX;
// 	 	follow.style.top = event.clientY;
// 	}
// }
 // );

var mouseX;
var mouseY;

var mouseCanvasX;
var mouseCanvasY;

var handleSticker = null;

document.addEventListener('mousemove', function(e){
	mouseX = e.clientX;
	mouseY = e.clientY;
});



// document.getElementById("montage")('mousemove', function(e){
// 	mouseX = e.clientX;
// 	mouseY = e.clientY;
// });



// document.addEventListener('mouseenter', onMouseUpdate, false);

// window.addEventListener('mousedown', function(event)
// {
// 	// console.log("souris");
// 	if (handleSticker)
// 	{
// 		var sticker;
// 		handleSticker = null;
// 		sticker = document.getElementById("sticker");
// 		sticker.parentNode.removeChild(sticker);
// 	}
// });

function instanceSticker(name)
{
	if (handleSticker == null)
	{
		console.log("fichtre");
		handleSticker = name;
		var img = document.createElement("img");
		img.src = "/camagru/stickers/" + name;
		img.style.position = "fixed";
		img.style.pointerEvents = 	"none";
		img.id = "sticker";
		img.style.opacity = "0.8";
		img.style.left = mouseX - (img.width/2);
		img.style.top = mouseY - (img.height/2);


		console.log()


		console.log(name);
		document.body.appendChild(img);

		window.addEventListener('mousemove', function(e)
		{
			img.style.left = e.clientX - (img.width/2);
			img.style.top = e.clientY - (img.height/2);
		});
	}
	else
	{
		var sticker;
		handleSticker = null;
		sticker = document.getElementById("sticker");
		sticker.parentNode.removeChild(sticker);
	}
}

(function()
{


	var sticker = "/camagru/stickers/pika.png";

	var video = document.querySelector('video');

	document.getElementById("takePhoto").onclick = function(e)
	{
		replaceVideo();
		displayStickers();
		var takeBtn = document.getElementById("takePhoto");
		takeBtn.parentNode.removeChild(takeBtn);
		var resetBtn = document.createElement("button");
		resetBtn.id = "retakePhoto";
		resetBtn.onclick = resetPhoto;
		resetBtn.appendChild(document.createTextNode("Reset Photo"));
		document.getElementById("btn").appendChild(resetBtn);
	}

	function displayStickers()
	{
		var menu = document.getElementById("menuStickers");
		menu.style.display = "block";
		// console.log("debug");
		// var stickers = ['pika','homer', 'dog'];
        //
		// stickers['pika'] = document.createElement("img");
		// document.body.appendChild(stickers['pika']);
	}

	function replaceVideo()
	{
		var canvas = document.createElement("canvas");
		canvas.id = "canvasPhoto";
		canvas.width = 640;
		canvas.height = 480;
		canvas.onclick = pasteSticker;
		canvas.getContext('2d').drawImage(video, 0, 0, 640, 480);

		document.getElementById("montage").appendChild(canvas);
		video.parentNode.removeChild(video);
	}

	// function mouseOnCanvas(e)
	// {
	// 	console.log(e.clientX);
	// 	mouseCanvasX = e.clientX;
	// 	mouseCanvasY = e.clientY;
	// }

	function pasteSticker()
	{
		console.log("sticker in hand = " + handleSticker);

		pasteOnCanvas();
		if (handleSticker)
		{
			var sticker;
			handleSticker = null;
			sticker = document.getElementById("sticker");
			sticker.parentNode.removeChild(sticker);
		}
	}

	function pasteOnCanvas()
	{
		var canvas = document.getElementById("canvasPhoto");
		var img = new Image();

		img.src = "/camagru/stickers/" + handleSticker;
		// console.log("image => " + mouseY);
		canvas.getContext('2d').drawImage(img, (mouseX - (img.width/2)) - canvas.offsetLeft, (mouseY - (img.height/2)) - canvas.offsetTop);

		console.log("test => " + canvas.offsetLeft);
		// console.log("mouse x =>" + (mouseX - (img.width/2)));
		// console.log("pouet =>" + canvas.parentNode.left);

	}

	// if (document.getElementById("canvasPhoto"))
	// {
	// 	console.log("pouet !");
	// 	document.getElementById("canvasPhoto").onmouseup = function(e)
	// 	{
	// 		console.log("stick !");
	// 	}
	// 	document.getElementById("canvasPhoto").onclick = function(e)
	// 	{
	// 		console.log("stick !");
	// 	}
	// }

	function createStickersCanvas()
	{
		canvasPhoto = document.createElement("canvasPhoto");

		canvas = document.createElement("canvas");
		// canvas.id = "canvasSticker";
		canvas.width = 640;
		canvas.height = 480;




		var img = new Image();
		img.src = sticker;
		// canvas.getContext('2d').fillStyle = 'rgb(200,0,0)'; // sets the color to fill in the rectangle with
		// canvas.getContext('2d').fillRect(10, 10, 55, 50);
		document.getElementById("canvasPhoto").appendChild(canvas);
		img.onload = function (){
			canvas.getContext('2d').drawImage(img, 10, 10);

		};
		// document.body.appendChild(img);
		// var img2 = document.createElement("img");
		// img2.src = sticker;
		// img2.width = 200;
		// img2.height = 200;
		// // img2.alt = alt;
        //
		// // This next line will just add it to the <body> tag

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
