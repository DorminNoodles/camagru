var mouseX;
var mouseY;

var handleSticker = null;
var origImg = new Image();
var stickersArr = [];
var video = document.querySelector('video');
var imageLoader = document.getElementById('imageLoader');
var importImg = null;


imageLoader.addEventListener('change', function(e){
	console.log("IMAGELOADER");
	importImg =  new Image();
	importImg.src = URL.createObjectURL(this.files[0]);
	console.log(importImg);
	changeUI();
	replaceVideo();
});


document.addEventListener('mousemove', function(e){
	mouseX = e.clientX;
	mouseY = e.clientY;
});


document.getElementById("takePhoto").onclick = function(e)
{
	changeUI();
	replaceVideo();
}

if (video)
{
	navigator.getUserMedia(
		{
			video: true
		},
		function(stream) {
			var vendorURL = window.URL;
			video.srcObject=stream;
			video.play();
		},
		function(err){
			console.log("NO WEBCAM AVAILABLE");
		}
	);
}

function changeUI() {
	var takeBtn = document.getElementById("takePhoto");
	takeBtn.parentNode.removeChild(takeBtn);
	var btnLoader = document.getElementById("labelLoader");
	btnLoader.parentNode.removeChild(btnLoader);
	var chooseFileBtn = document.getElementById("imageLoader");
	chooseFileBtn.parentNode.removeChild(chooseFileBtn);
	var resetBtn = document.createElement("button");
	resetBtn.id = "resetPhoto";
	resetBtn.onclick = resetPhoto;
	resetBtn.appendChild(document.createTextNode("Reset Photo"));
	// document.getElementById("btn").appendChild(resetBtn);
	document.getElementsByClassName("btn")[0].appendChild(resetBtn);
	displayStickers();
	createSaveBtn();
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
	console.log("blabla");
	var menu = document.getElementById("menuStickers");
	menu.style.display = "block";
}

function resetPhoto(e)
{
	location.reload();
}

function replaceVideo() {
	var canvas = document.createElement("canvas");
	canvas.id = "canvasPhoto";
	canvas.width = 640;
	canvas.height = 480;
	canvas.onclick = pasteSticker;

	if (importImg) {
		importImg.onload = function () {
			canvas.getContext('2d').drawImage(importImg, 0, 0, 640, 480);
			origImg.src = canvas.toDataURL();
		}
	}
	else {
		canvas.getContext('2d').drawImage(video, 0, 0, 640, 480);
		origImg.src = canvas.toDataURL();
	}
	document.getElementById("camera").appendChild(canvas);
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
	btn.id = "saveCompo";
	btn.onclick = savePhoto;
	btn.appendChild(document.createTextNode("Save Photo"));
	document.getElementsByClassName("btn")[0].appendChild(btn);
}

function savePhoto()
{
	var arr = stickersArr;
	var myJSON = JSON.stringify(arr);
	var params = {stickers: myJSON, img: origImg.src};
	var form = document.createElement("form");
	form.setAttribute("method", "post");
	form.setAttribute("action", "/camagru/montage/saveCompo");

	for(var key in params)
	{
		var hiddenField = document.createElement("input");
		hiddenField.setAttribute("type", "hidden");
		hiddenField.setAttribute("name", key);
		hiddenField.setAttribute("value", params[key]);
		form.appendChild(hiddenField);
	}
	document.body.appendChild(form);
	form.submit();
}

function pasteOnCanvas()
{
	var x;
	var y;
	var canvas = document.getElementById("canvasPhoto");
	var img = new Image();

	img.src = "/camagru/stickers/" + handleSticker;

	x = (mouseX - (img.width/2)) - canvas.offsetLeft;
	y = (mouseY - (img.height/2)) - canvas.offsetTop + document.body.scrollTop;
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
