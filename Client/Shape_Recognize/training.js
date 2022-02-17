let circles = [];
let squares = [];
let triangles = [];

function preload(){
	for(let i=0; i<100; i++){
		let index = nf(i+1, 4, 0);
		circles[i] = loadImage(`Dataset/circle${index}.png`);
		squares[i] = loadImage(`Dataset/square${index}.png`);
		triangles[i] = loadImage(`Dataset/triangle${index}.png`);
	}
}

let shapeRecognizer;

function setup(){
	createCanvas(400, 400);
	// background(0);
	// image(squares[0], 0, 0, width, height);

	let options={
		inputs: [64, 64, 4],
		task: 'imageClassification',
		debug: true
	};
	shapeRecognizer = ml5.neuralNetwork(options);

	for (let i = 0; i < circles.length; i++) {
		shapeRecognizer.addData({ image: circles[i] }, { label: 'circle' });
		shapeRecognizer.addData({ image: squares[i] }, { label: 'square' });
		shapeRecognizer.addData({ image: triangles[i] }, { label: 'triangle' });
	}

	shapeRecognizer.normalizeData();
	shapeRecognizer.train({epochs: 50}, finishedTraining);
}

function finishedTraining(){
	console.log('finished training!');
	//shapeRecognizer.save();
}
