var age = parseInt(prompt('Please enter your age.'));


//using if else

// if (age > 0 && age < 18) {
//     alert('You are not yet an adult.');
// } else if (age > 17 && age < 50) {
//     alert('You are an adult but not yet a senior.');
// } else if (age > 49 && age < 60) {
//     alert('You are a senior but not yet retired.');
// } else if (age > 59 && age < 121) {
//     alert('You are retired, enjoy your free time!');
// } else {
//     alert('Please enter your age between 1 and 120 years old :).');
// };


// using switch - compare the case to true! 

switch (true) {
    case  (age > 0 && age < 18) : 
        alert('You are not yet an adult.');
    break;
    case  (age > 17 && age < 50) : 
        alert('You are an adult but not yet a senior.');
    break;
    case  (age > 49 && age < 60) : 
        alert('You are a senior but not yet retired.');
    break;
    case  (age > 59 && age < 121) : 
        alert('You are retired, enjoy your free time!');
    break;
    default :
    alert('Please enter your age between 1 and 120 years old.');
}


//ternaries exercise

//question 1
var myNumber = 15;

if (myNumber > 10) {
    alert('The number is greater than 10.');
}

//ternary
myNumber>10 ? alert('The number is greater than 10.') : null; 

//question 2

var result, number = 42;

var result = number > 10 ? 'bigger than 10' : 'smaller than 10';
console.log(result);


