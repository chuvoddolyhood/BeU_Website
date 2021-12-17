const fs = require('fs');
const dir = '/jav-face-js-master/data';
const files = fs.readdirSync(dir);

for(const file of files){
	console.log(file);
}