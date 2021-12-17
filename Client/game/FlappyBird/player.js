class Player{
	constructor(x, y){
		this.x = x;
		this.y = y;
		this.velY = 0;
		this.velX = panSpeed;
		this.size = 40;
		this.dead = false;
		this.isOnGround = false;
		this.deadOnGroundCount = 0;
		this.score = 0;
		this.fallRotation = -PI / 6;
	}

	show(){
		push();
		translate(this.x - this.size / 2 - 8 + birdSprite.width / 2, this.y - this.size / 2 + birdSprite.height / 2);
    	if (this.velY < 2) {
      		rotate(-PI / 6);
      		this.fallRotation = -PI / 6;
    	}else if(this.velY <= 6) {
      		this.fallRotation += PI / 4.0;
      		this.fallRotation = constrain(this.fallRotation, -PI / 2, PI / 4);
      		rotate(this.fallRotation);
    	}else if(this.velY <= 10) {
      		this.fallRotation += PI / 8.0;
      		this.fallRotation = constrain(this.fallRotation, -PI / 6, PI / 2);
      		rotate(this.fallRotation);
    	}else{
      		rotate(PI / 2);
    	}
		image(birdSprite, -birdSprite.width / 2, -birdSprite.height / 2);
		pop();
	}

	update(){
		this.velY += gravity;
		if(this.y-this.size/2 < 0){
			this.y = 0+this.size/2;
			this.velY = 0;
		}else{
			this.velY += gravity;
		}
		

		if(!this.dead){
			this.velY = constrain(this.velY, -1000, 25);
		}else{
			this.velY = constrain(this.velY, -1000, 30);
		}

		if(!this.isOnGround){
			this.y += this.velY;
		}else{
			this.deadOnGroundCount++;
			if(this.deadOnGroundCount==50){
				//alert("Game Over!");
				setup();
			}
		}

		this.checkCollisions();

		if(pipes.passed(this)){
			this.score++;
		}
		if(pipes2.passed(this)){
			this.score++;
		}
	}

	checkCollisions(){
		if(!this.dead){
			pauseBecauseDead = false;
		}

		if(pipes.colided(this)){
			this.dead = true;
			pauseBecauseDead = true;
		}

		if(pipes2.colided(this)){
			this.dead = true;
			pauseBecauseDead = true;
		}

		if(ground.colided(this)){
			this.dead = true;
			this.isOnGround = true;
			pauseBecauseDead = true;
		}

		if(this.dead && this.velY < 0){
			this.velY = 0;
		}
	}

	flap(){
		if(!this.dead && !this.isOnGround){
			this.velY -= 10;
		}
	}
}