var num = 5;
var str = 'Hello';

var num1 = 3, num2 = 4;
var str1 = 'Hello', str2 = 'My name is Eunhye';

var num3 = 2, num4 = 5, num5 = 3;
var numResult = num3 + num4 + num5;
console.log(numResult);

var str3 = 'Hello ', str4 = 'My ', str5 = 'Name  is Eunhye';
var strResult = str3 + str4 + str5;
console.log(strResult);

var bool = true;

var num6 = 5;
var phrase = 'We are ' + num6 + ' people in this class';
console.log(phrase);

console.log(typeof num);
console.log(typeof str);
console.log(typeof num1);
console.log(typeof num2);
console.log(typeof num3);
console.log(typeof num4);
console.log(typeof num5);
console.log(typeof num6);
console.log(typeof numResult);
console.log(typeof str1);
console.log(typeof str2);
console.log(typeof str3);
console.log(typeof str4);
console.log(typeof str5);
console.log(typeof strResult);
console.log(typeof bool);
console.log(typeof phrase);

var num7 = 10, num8 = 2;
console.log(num7 + num8);
console.log(num7 - num8);
console.log(num7 * num8);
console.log(num7 / num8);
console.log(num7 % num8);

var result1 = (32 + 8) / (6 - 1); //8
var result2 = result1 / 5;
var result3 = result1 % 5;
console.log(result1);
console.log(result2);
console.log(result3);

console.log(result1 += num8);
console.log(result2 -= num7);
console.log(result3 *= num6);
console.log(num1 /= num8);
console.log(num4 %= num2);


var prompt1 = prompt('Choose a number between 0 to 100!');
console.log('Here is a number: ' + prompt1);

var prompt2 = parseInt(prompt('Choose another number between 0 to 100!'));
console.log('Here is another number: ' + prompt2)
console.log('The type of the number is: ' + typeof prompt2);

var prompt3 = prompt('Choose another number between 0 to 100!');
console.log('Here is another number: ' + prompt3)
console.log('The type of the number is: ' + typeof prompt3);


var x = 1, y = 3, z = 4;
var result4 = z - (y * x);
console.log('My result is ' + result4 + ' and the type of my variable result is ' + typeof result4);

var prompt4 = parseInt(prompt('Choose a number between 0 and 10!'));
var prompt5 = parseInt(prompt('Choose a second number between 0 and 10!'));
var prompt4 = parseInt(prompt('Choose a third number between 0 and 10!'));
var result5 = prompt4 - (prompt5 * prompt3);
console.log('My result is ' + result5 + ' and the type of my variable result is ' + typeof result5);


var name = prompt('What is your name?');
var age = parseInt(prompt('What is your age?'));
var nationality = prompt('Where are you coming from?');
var intro = "Hello, your name is " + name + ", you're " + age + " years old and you're from " + nationality + "."; 
console.log(intro);

var name = prompt('What is your name?');
var age = parseInt(prompt('What is your age?'));
var koreanAge = age + 1;
var nationality = prompt('Where are you coming from?');
var koreanIntro = "Hello, your name is " + name + ", you're " + age + " years old and you're from " + nationality + " but in Korea your age is " + koreanAge + "...Sorry you're older here! :)"; 
console.log(koreanIntro);
