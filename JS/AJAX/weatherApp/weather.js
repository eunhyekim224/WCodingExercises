// build the AJAX query
function requestWeather(city) {

    city = document.getElementById('cityInput').value;

    let xhr = new XMLHttpRequest();
    let encodedCity = encodeURIComponent(city);

    xhr.open('get', 'http://api.openweathermap.org/data/2.5/forecast?q=' + encodedCity + '&units=metric&appid=e71c95f08182ef53be14636637ab6b30');

    xhr.send(null);

    xhr.addEventListener('load', function() {
        displayWeather(JSON.parse(xhr.responseText));
        console.log(JSON.parse(xhr.responseText));
    });
}

//build the display
function displayWeather(info){

    if (info.cod == 404) {
        alert(info.message);
    } else {
        let output = document.getElementById('output');
        output.innerHTML = '';

        for (let i=2, c=info.list.length; i<=c; i+=8) {

            let eachDay = document.createElement('div');
            output.appendChild(eachDay);
            
            let mainTemp = info.list[i].main.temp;
            let description = info.list[i].weather[0].description;
            let windSpeed = info.list[i].wind.speed;
            let nameOfDay = getDayFromNum(new Date(info.list[i].dt_txt).getDay());       

            addWeatherInfo(mainTemp, eachDay, 'Temperature: ');
            addWeatherInfo(description, eachDay, '');
            addWeatherInfo(windSpeed, eachDay, 'WindSpeed: ');
            addWeatherInfo(nameOfDay, eachDay, '');
        }
    }
}

function addWeatherInfo(info, parent, string) {
    let display = document.createElement('p');
    display.textContent = string + info;
    parent.appendChild(display);
}

function getDayFromNum(num) {
    let days = ['', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    for (let i=1; i < days.length; i++) {
        if (num===i) {
            return days[i];
        }
    }
}


{
    let input = document.getElementById('cityInput');
   
    input.addEventListener('keyup',  function(e) {

        if (e.keyCode === 13) {
            requestWeather(e.target.value);
            e.target.value = '';
        } 
    });
}




