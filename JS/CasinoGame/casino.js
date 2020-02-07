// CASINO GAME //
/*
Principle :
--> at the beginning we have an amount of money (1000$) -- check
--> we seat at the table
--> we choose a number between 0 and 49 for our bet
--> we decide the amount of money we want to bet
--> we trigger a random number for the roulette game
-->	winning table decision :
	--> if our number is the same as the roulette one = bet multiplied by 3
	--> if they are of the same color then the bet is multiplied by 0.5
	--> otherwise lose the bet
--> we add or subtract the money
--> we ask the player if he wants to leave or continue to play.
*/


function randomNumber(min, max) {
    return Math.floor(min + (max-min+1)*Math.random())
}


function casino(min, max, amountOfMoney) {
    let winnings = 0;
    let randomNum = randomNumber(min, max);
    let currentAmount = amountOfMoney;

    let numMsg = `Hello hello! Are you ready to become a millionaire? Yes you are!! Choose a lucky number between ${min} to ${max}!`;
    let betMsg = `Alright then! Feeling confident?? You have $${currentAmount} right now. How much will you bet?`
    
    let num;
    let bet;
    let continueGame;  // need to have this outside the loop! 
  

    do {
        num = prompt(numMsg); 
        console.log('You chose this number: ' + num);

        if (num == null) {
            return 0;
        }

        //not parsing it straight away because I want the conditions to distinguish and catch when num returns 'cancel' and 'string.' if i parse it from the start, and my condition is isNaN ('string'), then it will cancel... 
        //but here, you can only cancel before you enter your first num/bet. once you get an invalid number, you have to continue

        num = parseInt(num);
        while  (isNaN(num)|| num < min || num > max) {
            num = parseInt(prompt('Please enter a valid number.'));
        }

        bet = prompt(betMsg);
        console.log('You bet: $' + bet);

        if (bet == null) {
            return 0;
        }

        bet = parseInt(bet);
        while (isNaN(bet) || bet < 1 || bet > currentAmount) {
            bet = parseInt(prompt('Please enter a valid amount.'));
        }

        if (bet === currentAmount) {
            alert('All in!!')
        }

        if (num === randomNum) {
            winnings = bet * 3;
            currentAmount += winnings; 
            console.log(`Congrats! You got the lucky number! You won $${winnings} and now you have $${currentAmount} left.`);
            console.log('Amount you started with: $' + amountOfMoney);

        } else if (num % 2 === bet % 2) {
            winnings = bet * 0.5;
            currentAmount += winnings; //not currentAmount = amountOfMoney + winnings, bc you want to change the currentAmount as you continue the game 
            console.log(`Congrats! You got the lucky colour! You won $${winnings} and now you have $${currentAmount} left.`);
            console.log('amount you started with: $' + amountOfMoney);

        } else  {
            currentAmount -= bet;
            console.log(`Sorry, you have lost your $${bet} bet. Now you have $${currentAmount}.`);        
        }


        continueGame = confirm('Wanna play again?');
       

    } while (continueGame && currentAmount > 0);

    if (currentAmount == 0) {
        console.log(`You've run out of money. There's an ATM outside :).`);
    } else if (currentAmount > amountOfMoney) {
        totalWinnings = Math.abs(amountOfMoney - currentAmount);
        console.log(`Hope you enjoyed the game! You have won a total of $${totalWinnings}, and you now have $${currentAmount}. See you next time!`)
    } else if (currentAmount < amountOfMoney) {
        totalLosses = amountOfMoney - currentAmount;
        console.log(`Hope you enjoyed the game! You have lost a total of $${totalLosses} and you now have $${currentAmount}. Thanks for your donation!`)
    } 
}
