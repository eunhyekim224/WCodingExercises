//QUESTION 1.//

let firstCapitalLetterRegex = /^[A-Z]/;

console.log(firstCapitalLetterRegex.test('Hello'));

//QUESTION 3.//

let emailRegex = /(^[a-zA-Z0-9(\W)_]+)@([a-zA-Z0-9.]+)\.([a-z]{2,6})$/i;

console.log(emailRegex.test("hEllo0123.456789.!#$%&'*+-/=?^_`{|}~@gmail.kr.com"));

// add . but not at the start or end

//QUESTION 4.//

let dateRegex = /^(\d{2})\/(\d{2})\/(\d{4})$/;
console.log(dateRegex.test("24/02/2019"));


//QUESTION 8.//

function getNumberOfVowels(str) {
    let vowelRegex = /[AEIOU]/ig
    console.log(str.match(vowelRegex).length + ' vowels'); 
} 

getNumberOfVowels('United States');


//QUESTION 21.//

function thousandsSeparators(num) {


    let thousandsRegex = /^(\d{1,3})((\d{3})*)(\.\d+)?$/; 

    if (thousandsRegex.exec(num)) {

        let firstDigits = RegExp.$1;
        let middleDigits = RegExp.$2;
        let decimals = RegExp.$4;
    
        let threeDigitsRegex = /[0-9]{3}/g;
        let threeDigits = middleDigits.match(threeDigitsRegex);
        console.log(threeDigits);
    
        let separatedDigits = threeDigits.join(',')
    
        if (decimals) {
            console.log(firstDigits + ',' + separatedDigits + decimals)
        } else {
            console.log(firstDigits + ',' + separatedDigits)
        }
    } else {
        console.log('Please input a number!');
    }
}

thousandsSeparators('10000000000000000.23')


//  ?! means not one or zero ! (so basically none)