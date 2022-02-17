let shapeRecognizer;
let canvas;
let resultsDiv;
let inputImage;
let clearButton;
let video;

function setup(){
	canvas = createCanvas(400, 400);
	video = createCapture(VIDEO);
	video.size(64, 64);

	let options={
		inputs: [64, 64, 4],
		task: 'imageClassification'
	};
	shapeRecognizer = ml5.neuralNetwork(options);

	const modelDetails = {
		model: 'model/model.json',
		metadata: 'model/model_meta.json',
		weights: 'model/model.weights.bin'
	}

	background(255);

	resultsDiv = createDiv('loading model');
	inputImage = createGraphics(64, 64);

	shapeRecognizer.load(modelDetails, modelLoaded);
}

function modelLoaded(){
	console.log('model ready!');
	recognizeImage();
}

function recognizeImage(){

	shapeRecognizer.classify({
		image: video
	}, gotResults);
}

function gotResults(error, results){
	if(error){
		console.error(error);
		return;
	}

	let label = results[0].label;
	let confidence = nf(100 * results[0].confidence, 2, 1);

	if(confidence>50){
		resultsDiv.html(`${label} ${confidence}%`);
	}else{
		resultsDiv.html(`Can't recognize!`);
	}

	// console.log(results);
	recognizeImage();
}

function draw(){
	image(video, 0, 0, width, height);
}
