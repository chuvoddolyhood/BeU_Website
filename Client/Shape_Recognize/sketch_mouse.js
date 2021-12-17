let shapeRecognizer;
let canvas;
let resultsDiv;
let inputImage;
let clearButton;

function setup(){
	canvas = createCanvas(400, 400);
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
	clearButton = createButton('Clear');
	clearButton.mousePressed(function(){
		background(255);
	});
	resultsDiv = createDiv('loading model');
	inputImage = createGraphics(64, 64);

	shapeRecognizer.load(modelDetails, modelLoaded);
}

function modelLoaded(){
	console.log('model ready!');
	recognizeImage();
}

function recognizeImage(){
	inputImage.copy(canvas, 0, 0, 400, 400, 0, 0, 64, 64);
	//image(inputImage, 0, 0);

	shapeRecognizer.classify({image: inputImage}, gotResults)
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

	if(mouseIsPressed){
		strokeWeight(8);
		line(mouseX, mouseY, pmouseX, pmouseY);
	}

	// stroke(0);
	// noFill();
	// strokeWeight(4);
	// rectMode(CENTER);
	// rect(width/2, height/2, 40);
}
