class Ground{
	constructor(){
		this.height = 30;
		this.y = canvas.height - this.height;
		this.x = 0;
	}

	show(){
		fill(0);
	    rect(0, this.y, canvas.width, this.height);
	    for(var i = this.x; i < canvas.width; i += groundSprite.width){
	      	image(groundSprite, i, this.y);
	    }
	}

	update() {
    	this.x -= panSpeed;
    	if (this.x <= -groundSprite.width) {
      		this.x += groundSprite.width;
      	}
    }

	colided(p){
		if(p.y+p.size/2 >= this.y){
			return true;
		}
		return false;
	}
}