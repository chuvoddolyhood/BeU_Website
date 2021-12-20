let board = [
	['', '', ''],
	['', '', ''],
	['', '', '']
];

let w;
let h;
let canvas;
let result;

let ai = 'X';
let human = 'O';
let currentPlayer = human;

function setup(){
	canvas = createCanvas(600, 600);
	w = width/3;
	h = height/3;
	canvas.position(0, 0);
	canvas.style('position', 'fixed');
	canvas.style('display', 'flex');
	canvas.style('left', 'calc(50% - 300px)');
	canvas.style('top', 'calc(45% - 300px');
	//bestMove();
}

function equals3(a, b, c){
	return a==b && b==c && a!='';
}

function checkWinner(){
	let winner = null;

	for(let i=0; i<3; i++){
		if(equals3(board[i][0], board[i][1], board[i][2])){
			winner = board[i][0];
		}
	}
	for(let i=0; i<3; i++){
		if(equals3(board[0][i], board[1][i], board[2][i])){
			winner = board[0][i];
		}
	}
	if(equals3(board[0][0], board[1][1], board[2][2])){
		winner = board[0][0];
	}
	if(equals3(board[2][0], board[1][1], board[0][2])){
		winner = board[2][0];
	}

	let openSpots = 0;
	for(let i=0; i<3; i++){
		for(let j=0; j<3; j++){
			if(board[i][j] == ''){
				openSpots++;
			}
		}
	}

	if(winner==null && openSpots==0){
		return 'tie';
	}else{
		return winner;
	}
}

function mousePressed(){
	if(currentPlayer == human){

		let i = floor(mouseX/w);
		let j = floor(mouseY/h);

		if(i>=0 && i<=2 && j>=0 && j<=2){
			if(board[i][j] == ''){
				board[i][j] = human;
				currentPlayer = ai;
				let check = checkWinner();
				if(check == null){
					bestMove();
				}
			}
		}
	}
}

function draw(){
	background(255);
	strokeWeight(4);

	line(0, 0, 0, height);
	line(w*3, 0, w*3, height);
	line(0, 0, width, 0);
	line(0, h*3, width, h*3);

	line(w, 0, w, height);
	line(w*2, 0, w*2, height);
	line(0, h, width, h);
	line(0, h*2, width, h*2);

	for(let j=0; j<3; j++){
		for(let i=0; i<3; i++){
			let x = w*i + w/2;
			let y = h*j + h/2;
			let spot=board[i][j];
			textSize(32);
			let r = w/4;
			if(spot == human){
				noFill();
				ellipse(x, y, r*2);
			}else if(spot == ai){
				line(x-r, y-r, x+r, y+r);
				line(x+r, y-r, x-r, y+r);
			}
		}
	}

	if(result != null){
		noLoop();
		var user_score;
		if(result == 'tie'){
			user_score = 25;
			alert("Bạn đã hòa! Bạn đạt được 20 BeUToken trong trận này");
		}else{
			if(result == "X"){
				user_score = 15;
				alert("Bạn đã thua! Bạn đạt được 10 BeUToken trong trận này");
			}else{
				user_score = 100;
				alert("Xin chúc mừng bạn đã thắng! Bạn đạt được 100 BeUToken trong trận này");
			}
		}

		var user_name = document.getElementById('user_name').innerHTML;
		var game_name = "TicTacToe";

		var ajax = new XMLHttpRequest();
		var method = "GET";
		var url = "./Client/game/Process/php/add_user_score.php?add=score&userName="+user_name+"&gameName="+game_name+"&userScore="+user_score;
		var asynchronous = true;

		ajax.open(method, url, asynchronous);

		ajax.send();

		ajax.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				// alert(response);
				if(response == "true"){
					alert(`Đã thêm ${user_score} BeUToken vào ví, hãy dùng nó để đổi nhiều voucher độc đáo tại phần đổi thưởng nhé!`);
					window.location = "./index.php?quanly=game";
				}else{
					alert('Xảy ra lỗi trong quá trình cập nhật điểm. Vui lòng liên hệ với nhân viên để được trợ giúp!');
				}
			}
		}
	}
	result = checkWinner();
}

function restart(){
	location.reload();
}