function siblingNames() {
    
    let names = [];
        name;

    while (name = prompt('Enter the names of your brothers or sisters: ')) {
        names.push(name);
    }

    if (names.length > 0) {
        alert(names.join(' '));
    } else {
        alert('You didn\'t enter any names.');
    }
}


siblingNames(); 


// part 2

// qs1
var array = [0,1,1,2,3,5,8,13,21,34];

for (var i=0, c=array.length; i<c; i++) {
    console.log(array[i]);
}

// qs2
var family = {
    mother: 'Soonbun',
    father: 'Taekwon',
    sister: 'Sunhye',
    brother: 'Minchang',
}

for (var member in family) {
    console.log(`My ${member}'s first name is: ${family[member]}`);
}







