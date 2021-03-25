window.onload = function() {
	var can = document.getElementById('canvas'),
	spanProcent = document.getElementById('fun_procent'),
	c = can.getContext('2d');
	
	var fun_percentage=50;//zmienna fun
	var science_percentage=50;//zmienna science
	var money_percentage=50;//zmienna money
	var relationships_percentage=50;//zmienna relationships
	var posX = can.width / 2,
		posY = can.height / 2,
		fps = 1000 / 200,
		procent = 0,
		oneProcent = 360 / 100,
		result = oneProcent * fun_percentage;
		
		c.lineCap = 'round';
		funMove();

function funMove(){
	var deegres = 0;
	var acrInterval = setInterval (function() {
		deegres += 1;
		c.clearRect( 0, 0, can.width, can.height );
		procent = deegres / oneProcent;
		
		//spanProcent.innerHTML = "<i class='fas fa-glass-martini'></i>";

		c.beginPath();
		c.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + 360) );
		c.strokeStyle = '#b1b1b1';
		c.lineWidth = '10';
		c.stroke();

		c.beginPath();
		c.strokeStyle = '#4d94ff';
		c.lineWidth = '10';
		c.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + deegres) );
		c.stroke();
		if( deegres >= result ) clearInterval(acrInterval);
	}, fps);
		
}


}