
function getFormContent(buttonID, parent) {
    switch(buttonID) {
        case "flightsButton" : file = "http://localhost:8080/sites/test/flightsContent.html"; break;
        case "hotelsButton" : file = "http://localhost:8080/sites/test/hotelsContent.html"; break;
        case "oneWay" : file = "http://localhost:8080/sites/test/oneWayContent.html"; break;
        case "multiCity" : file = "http://localhost:8080/sites/test/multiCityContent.html"; break;
        default : break;
    }

    let xhr = new XMLHttpRequest();
    xhr.open('GET', file);
    xhr.addEventListener('readystatechange', () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            document.getElementById(parent).innerHTML = '<div>' + xhr.responseText + '</div>';
        } else if (xhr.readyState === XMLHttpRequest.DONE && xhr.status != 200) {
            alert('There is an error !\n\nCode :' + xhr.status + '\nText : ' + xhr.statusText);
        }
        
    });
    
    xhr.send(null);
}

let mainButtons = document.getElementsByClassName('buttons');
console.log(mainButtons)
for (let i=0; i<mainButtons.length; i++) {
    mainButtons[i].addEventListener('click', (e) => {
        getFormContent(e.target.id, 'mainForm');
        e.target.style.backgroundColor = 'blue';
    });
}
getFormContent(mainButtons[0].id, 'mainForm');


console.log(document.querySelector('#flightTypeOutput'));
if (document.getElementById('flightTypeOutput')) {

    let flightsSubButtons = document.getElementsByClassName('subButtons');
    console.log(flightsSubButtons);

    for (let i=0; i<flightsSubButtons.length; i++) {
        flightsSubButtons[i].addEventListener('click', (e) => {
            getFormContent(e.target.id, 'flightTypeOutput');
            e.target.style.backgroundColor = 'blue';
        });
    }
    
    getFormContent(flightsSubButtons[0].id, 'flightTypeOutput');
    

}





