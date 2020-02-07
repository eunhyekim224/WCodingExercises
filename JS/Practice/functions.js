// //scope of variables 

// var hasCinnamon = true; 

// function makeCoffee() {
//     var hasMilk = true; 
//     if (hasMilk && hasCinnamon) {
//         alert('here is your latte with cinnamon on top')
//     } else {
//         alert('here is your americano')
//     }
// }

// makeCoffee();

// if (hasCinnamon) {
//     alert('mm i love cinnamon');
// };
// //hasCinnamon is a global var, and is set to true so the code will execute 

// if (hasMilk) {
//     alert('this has milk in it!!');
// }; 
// //even though hasMilk == true, bc it's in a local scope, it is not defined


// // class notes 

// //using let and const, use let for now, const might not make a huge difference 

// //anonymous function ES6 
// //passing anon function to a function and executing it 
// function func1 () {}

// func1(
//     () => {
//         console.log('something');
//     }
// ); 



// //concat 

// var hello, name 
// // some string value 

// console.log(`Good morning and ${hello} ${name}`)


// function add1(num) {
//     const num = 1;
//     return num++
// }




//exercise 30/1

function sayHello() {
    alert('Hello World!');
}

sayHello();

function askNumber() {
    let answer = prompt('Please enter a number :)');

    if (isNaN(parseInt(answer))) {
        answer = askNumber();
    } 
        return answer; 
}

alert('the number is : ' + askNumber());

//casino game!

//when testing prompt, treat it directly after writing it, or wait after writing the whole code then treat the bugs 

function randomNumber(min, max) {
    let nb = min + (max - min + 1)*Math.random(); 
    return Math.floor(nb);
}