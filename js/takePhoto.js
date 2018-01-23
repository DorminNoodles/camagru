var mouseX;
var mouseY;

var handleSticker = null;
var stickersArr = [];
var video = document.querySelector('video');

document.addEventListener('mousemove', function(e){
	mouseX = e.clientX;
	mouseY = e.clientY;
});

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
	createSaveBtn();
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


function displayStickers()
{
	var menu = document.getElementById("menuStickers");
	menu.style.display = "block";
}

function resetPhoto(e)
{
	location.reload();
	// console.log("HELLLLO");
	// canvas = document.getElementById("canvasPhoto");
	// canvas.parentNode.removeChild(canvas);
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

function createSaveBtn()
{
	var btn = document.createElement("button");
	btn.appendChild(document.createTextNode("Save Photo"));
	document.getElementById("btn").appendChild(btn);
}

function savePhoto()
{


}

function pasteOnCanvas()
{
	var x;
	var y;
	var canvas = document.getElementById("canvasPhoto");
	var img = new Image();

	img.src = "/camagru/stickers/" + handleSticker;

	x = (mouseX - (img.width/2)) - canvas.offsetLeft;
	y = (mouseY - (img.height/2)) - canvas.offsetTop;
	canvas.getContext('2d').drawImage(img, x, y);

	stickersArr.push({x:x, y:y, name:handleSticker});
	console.log(stickersArr);
}

function createStickersCanvas()
{
	canvasPhoto = document.createElement("canvasPhoto");

	canvas = document.createElement("canvas");
	canvas.width = 640;
	canvas.height = 480;

	var img = new Image();
	img.src = sticker;
	document.getElementById("canvasPhoto").appendChild(canvas);
	img.onload = function (){
		canvas.getContext('2d').drawImage(img, 10, 10);

	};
}
