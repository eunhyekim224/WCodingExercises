// let min = 0;
// let max = 10;
// let randomNum = randomNumber(min, max);
// let gamePrompt = prompt(`Choose a number between ${min} and ${max}`);

// function randomNumber(min, max) {
//     return Math.floor(min + (max-min+1)*Math.random())
// }

// function moreOrLess(min, max) {
//     let cpt = 0;
//     let input = parseInt(gamePrompt);
//     do {
//         switch(true) {
//             case (input < randomNum):
//                 alert('More');
//                 input = parseInt(prompt(`Choose a number between ${min} and ${max}`));
//             break;
//             case (input > randomNum):
//                 alert('Less');
//                 input = parseInt(prompt(`Choose a number between ${min} and ${max}`));
//             break;
//             case (input < 0 || input > 10):
//                 alert(`I said a number between ${min} and ${max}...`);
//                 input = parseInt(prompt(`Choose a number between ${min} and ${max}`));
//             break;   
//             default: 
//                 alert('That\'s not a valid input!');
//                 input = parseInt(prompt(`Choose a number between ${min} and ${max}`));
//         }
//         cpt++;
//     } while (input !== randomNum);

//     alert(`Congratulations! You won in ${cpt} rounds!`);
// }

//improvement 1

// function randomNumber(min, max) {
//     return Math.floor(min + (max-min+1)*Math.random())
// }

// function moreOrLess(min, max) {
//     let randomNum = randomNumber(min, max);
//     let cpt = 1;
//     let input = parseInt(prompt(`Choose a number between ${min} and ${max}`));
//     do {
//         switch(true) {
//             case (input < randomNum):
//                 alert('More');
//                 input = parseInt(prompt(`Choose a number between ${min} and ${max}`));
//             break;
//             case (input > randomNum):
//                 alert('Less')
//                 input = parseInt(prompt(`Choose a number between ${min} and ${max}`));
//             break;
//             case (input < 0 || input > 10):
//                 alert(`I said a number between ${min} and ${max}...`);
//                 input = parseInt(prompt(`Choose a number between ${min} and ${max}`));
//             break;
//             // case (input == null):
//             //     return 0;   
//             default: 
//                 alert('That\'s not a valid input!');
//                 input = parseInt(prompt(`Choose a number between ${min} and ${max}`));
//         }
//         cpt++;
//     } while (input !== randomNum);

//     return cpt;
// }  


// function LoM_game(min, max) {

//     let numberOfRounds = 0;
//     let bestCpt = 100;
//     do { 
//         let currentCpt = moreOrLess(min, max)         
//         if (currentCpt < bestCpt) {                                    
//              bestCpt = currentCpt;                                                  
//         } 
//         alert(`Congratulations! You won in ${currentCpt} guesses!`);
//         numberOfRounds++; 
//     } while (confirm('Would you like to play another round?'))

//     let msg = `You played ${numberOfRounds} rounds. \n Your best score was ${bestCpt}.`;
//     alert(msg);

// }


// final game 

function randomNumber(min, max) {
    return Math.floor(min + (max-min+1)*Math.random())
}


function moreOrLess(min, max) {
    let randomNum = randomNumber(min, max);
    let cpt = 0;
    let input;
    let msg = `Choose a number between ${min} and ${max}`

    do {
        // input = prompt(msg);
        // if (input == null){
        //     break;
        // }
        // input = parseInt(input);
        input = parseInt(prompt(msg));
        switch(true) {
            case (input < randomNum):
                msg = 'More';
            break;
            case (input > randomNum):
                msg = 'Less';
            break;
            case (input < min || input > max):
                msg = `I said a number between ${min} and ${max}...`
            break;  
            case ((isNaN(input))): 
                return 0;
            default: 
                msg = 'That\'s not a valid input!';
                break;
        }
        cpt++;
    } while (input !== randomNum);

    return cpt;
}



function LoM_game(min, max) {

    let numberOfRounds = 0;
    let bestCpt = 100;
    do { 
        let currentCpt = moreOrLess(min, max)         
        if (currentCpt < bestCpt) {                                    
             bestCpt = currentCpt;                                                  
        } 
        alert(`Congratulations! You won in ${currentCpt} guesses!`);
        numberOfRounds++; 
    } while (confirm('Would you like to play another round?'))

    let msg = `You played ${numberOfRounds} rounds. \n Your best score was ${bestCpt}.`;
    alert(msg);

}









