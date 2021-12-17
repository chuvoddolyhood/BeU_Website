class PipePair{
	constructor(){
		this.gap = 250;
		this.topHeight = floor(random(40, canvas.height - this.gap));
		this.bottomHeight = canvas.height - this.topHeight - this.gap;

		this.bottomPipe = new Pipe(false, this.bottomHeight);
		this.topPipe = new Pipe(true, this.topHeight);
		this.pass = false;
	}

	show(){
		this.bottomPipe.show();
		this.topPipe.show();
	}

	update(){
		this.bottomPipe.update();
		this.topPipe.update();
	}

	offScreen(){
		if(this.bottomPipe.x + this.bottomPipe.width < 0){
			return true;
		}
	}

	setX(newX){
		this.bottomPipe.x = newX;
		this.topPipe.x = newX;
	}

	colided(p){
		return this.bottomPipe.colided(p) || this.topPipe.colided(p);
	}

	passed(p){
		if (!this.pass && p.x-p.size/2>this.bottomPipe.x+this.bottomPipe.width) {
			this.pass = true;
      		return true;
    	}
    	return false;
	}
}