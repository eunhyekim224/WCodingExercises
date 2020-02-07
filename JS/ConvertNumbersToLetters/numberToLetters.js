numToLetters();

function makeHundreds() {
    let allHundreds = [];
    for (var i=1; i <10 ; i++) {
        allHundreds.push(i*100);
    }
    return allHundreds;
}

function numToLetters() {

    let allUnits = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    let allTens = [10, 20, 30, 40, 50, 60, 70, 80, 90];
    let elevenToNineteen = [11, 12, 13, 14, 15, 16, 17, 18, 19];
    let allHundreds = makeHundreds();
    
    let parsedUnits = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine']
    let parsedTens = ['ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
    let parsedElevenToNineteen = ['eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
    let parsedHundreds = ['one hundred', 'two hundred', 'three hundred', 'four hundred', 'five hundred', 'six hundred', 'seven hundred', 'eight hundred', 'nine hundred']
   
    let msg = 'Enter a number between 0 to 999.'

    do {

        num = prompt(msg);

        if (num == null) {
            return 0;
        }

        num = parseInt(num, 10);
        while (isNaN(num) || num < 0 || num > 999) {
            num = parseInt(prompt('Please enter a valid number.'));
        }

        let unit = num % 10; 
        let tens = (num % 100) - unit; 
        let hundreds = (num % 1000) - tens - unit; 
        let elevenToNineteens = num % 100;

        let unitIndex = allUnits.indexOf(unit);
        let tensIndex = allTens.indexOf(tens);
        let hundredsIndex = allHundreds.indexOf(hundreds);
        let elevenToNineteenIndex = elevenToNineteen.indexOf(elevenToNineteens);

        let isElevenToNineteen = elevenToNineteens < 20 && elevenToNineteens > 10;
        let numLength = num.toString().length;

        let isTens = unit == 0;
        let isHundreds = (unit==0 && tens==0);

        

        if (numLength == 1) {
            msg = parsedUnits[unitIndex];

        } else if (numLength == 2 && !isElevenToNineteen && !isTens) {
            msg = parsedTens[tensIndex] + '-' + parsedUnits[unitIndex] + '\n Want to enter another number?';  
        
        } else if (numLength == 2 && isTens) {
            msg = parsedTens[tensIndex] + '\n Want to enter another number?';    

        } else if (numLength == 2 && isElevenToNineteen) {
            msg = parsedElevenToNineteen[elevenToNineteenIndex] + '\n Want to enter another number?';

        } else if (numLength == 3 && !isElevenToNineteen && !isHundreds && !isTens) {
            msg = parsedHundreds[hundredsIndex] + ' and ' + parsedTens[tensIndex] + '-' + parsedUnits[unitIndex] + '\n Want to enter another number?';

        } else if (numLength == 3 && isHundreds) {
            msg = parsedHundreds[hundredsIndex] + '\n Want to enter another number?';

        } else if (numLength ==3 && isTens) {
            msg = parsedHundreds[hundredsIndex] + ' and ' + parsedTens[tensIndex] + '\n Want to enter another number?';
         
        } else if (numLength == 3 && isElevenToNineteen) {
            msg = parsedHundreds[hundredsIndex] + ' and ' + parsedElevenToNineteen[elevenToNineteenIndex]+ '\n Want to enter another number?';
        }

    } while (num);
}




// || num > 999 || num < 0


