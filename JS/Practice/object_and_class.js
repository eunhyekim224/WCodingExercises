///////// Using literal object to create classes////////////
		/////////Demonstration CAR RACE ////////////
// Constructor to make all cars
function Car(inMake, inModel, inEngine, inDoors) {
	this.make = inMake,
	this.model = inModel,
	this.engine = inEngine,
	this.doors = inDoors,
	this.speed = 0,
	this.addSpeed = function(newSpeed) {
		this.speed = this.speed + newSpeed;
	}
}


// Create the cars
let carsArr = [];

//create with a variable to hold the car
let car1 = new Car("Kia", "Rio", 2.4, 5);
carsArr.push(car1);

// skippin the variable
carsArr.push(new Car("Hyundai", "Tiburon", 4.3, 5));
carsArr.push(new Car("Ford", "Focus", 2.0, 4));
carsArr.push(new Car("BMW", "M3", 5.2, 2));
carsArr.push(new Car("Audi", "TT", 1.8, 3));

console.log(carsArr);

// Create the race
let race = {
	allCars : carsArr,
	lapLength: 2000,
	numLaps : 10,
	totalTime: 0,
	startRace: function () {
		//Track the distance and laptime for each car, we put the variables inside each car object, si they can track themselves
		for (let i = 0; i<this.allCars.length; i++){
			let thisCar = this.allCars[i];
			thisCar.distance = 0;
			thisCar.lapTime = 0;
		}

		//do the 10 loops
		for(let loop = 0; loop<this.numLaps; loop++) {
			console.log("\n==============", "LOOP : "+ (loop+1) + "============");
			this.doLoop(loop);
			this.printPositions();
		}


	},
	doLoop : function(loopNum) {
		//Adjust the speed of all the cars
		for (let i= 0; i< this.allCars.length; i++) {
			let thisCar = this.allCars[i];
			let newSpeed = Math.ceil(Math.random()*10);
			thisCar.addSpeed(newSpeed);
		}

		//Sort the positions of all cars, based on the distance
		//Except the first loop, which is based on the speed, since they start out at the same distance

		//Distance to end of current lap
		let lapFinish = (loopNum+1)*this.lapLength;

		//Determine the laptime for every car in the race for the loop
		for(let i=0; i<this.allCars.length; i++) {
			let thisCar = this.allCars[i];
			let distanceToLapFinish = lapFinish - thisCar.distance;
			let timeToLapFinish = distanceToLapFinish/thisCar.speed;
			thisCar.lapTime = timeToLapFinish;
		}

		//Sort the cars by laptime
		this.allCars.sort(function(a,b) { return a.lapTime - b.lapTime});

		// Lap time is determined by the first car accross the line for the lap, This is also the end of the lap!
		let currLapTime = this.allCars[0].lapTime;

		// Determine the distance for each car, using speed and laptime(end of the lap)
		for(let i = 0; i<this.allCars.length; i++) {
			let thisCar = this.allCars[i];
			thisCar.distance = thisCar.distance + (thisCar.speed * currLapTime);

			//Print out for debugging and monitor each lap
			// console.log(thisCar.make
			// 	+ "\t" + thisCar.model
			// 	+ "\t" + thisCar.speed
			// 	+ "\t" + thisCar.distance.toFixed(2)
			// 	+ "\t" + thisCar.lapTime.toFixed(2)
			// 	);
		}

		console.log("LAP TIME : ", currLapTime.toFixed(2));
		this.totalTime = this.totalTime + currLapTime;

	},
	printPositions : function(){
		let firstPlaceDistance = 0; // to store the distance of first place (should be numLaps * lapLength)
		for(let i=0; i<this.allCars.length; i++){
			let thisCar = this.allCars[i];
			var output = (i+1) + " " + thisCar.make + " " + thisCar.model;
			if(firstPlaceDistance === 0) { firstPlaceDistance = thisCar.distance;}
			else{
				output += " ( -" + (firstPlaceDistance - thisCar.distance).toFixed(2) + ")";
			}
			console.log(output);
		}
	}
}

race.startRace();


//// ES6 class new way to declare /////
/**

http://es6-features.org/#ClassDefinition

**/










