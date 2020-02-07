///////// Using literal object to create classes////////////
		/////////Demonstration CAR RACE ////////////
// Constructor to make all cars

class Car {
    constructor (inMake, inModel, inEngine, inDoors) {
        this.make = inMake
        this.model = inModel
        this.engine = inEngine
        this.doors = inDoors
        this.speed = 0
    }
    addSpeed(newSpeed) {
        this.speed = this.speed + newSpeed;
    }
}
//dont need to add the function to the constructor! 


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


class Race {
    constructor (carsArr, lapLength, numLaps, totalTime) {
        this.allCars = carsArr
        this.lapLength = lapLength
        this.numLaps = numLaps
	    this.totalTime = totalTime
    }
    startRace() {
        for (let i = 0; i<this.allCars.length; i++){
			let thisCar = this.allCars[i];
			thisCar.distance = 0;
			thisCar.lapTime = 0;
        }
        
        for(let loop = 0; loop<this.numLaps; loop++) {
			console.log("\n==============", "LOOP : "+ (loop+1) + "============");
			this.doLoop(loop);
			this.printPositions();
		}
    }
    doLoop(loopNum) {
        for (let i= 0; i< this.allCars.length; i++) {
			let thisCar = this.allCars[i];
			let newSpeed = Math.ceil(Math.random()*10);
			thisCar.addSpeed(newSpeed);
        }

        let lapFinish = (loopNum+1)*this.lapLength;

        for(let i=0; i<this.allCars.length; i++) {
			let thisCar = this.allCars[i];
			let distanceToLapFinish = lapFinish - thisCar.distance;
			let timeToLapFinish = distanceToLapFinish/thisCar.speed;
			thisCar.lapTime = timeToLapFinish;
        }
        
        this.allCars.sort(function(a,b) { return a.lapTime - b.lapTime});

        let currLapTime = this.allCars[0].lapTime;

        for(let i = 0; i<this.allCars.length; i++) {
			let thisCar = this.allCars[i];
			thisCar.distance = thisCar.distance + (thisCar.speed * currLapTime);
        
        console.log("LAP TIME : ", currLapTime.toFixed(2));
		this.totalTime = this.totalTime + currLapTime;
        }
    }
    printPositions() {
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

race1 = new Race(carsArr, 2000, 10, 0);

race1.startRace();




//// ES6 class new way to declare /////
/**

http://es6-features.org/#ClassDefinition

**/










