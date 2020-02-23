// EXECUTION //
autoComplete();
///////////////

function autoComplete() {
    let searchInput = document.querySelector('#searchCity');
    let results = document.querySelector('#results');

    searchInput.addEventListener('keyup', (e)=> {

            if (e.keyCode==40) {
                results.firstElementChild.focus();
                navigateSuggestions(results, searchInput);
            } else {
                getMatchedCity(e, results);  
            }      
           
    });  
}

function getMatchedCity(event, results) {
    let xhr = new XMLHttpRequest();
    xhr.open('get', 'http://localhost:8080/sites/exercises/autocompletion/cities.php?searchCity=' + encodeURIComponent(event.target.value));
    xhr.send(null);
    xhr.addEventListener('load', (e)=> {
        results.innerHTML = '';
        sortAndShowSuggestions(e, results);
    });
}

function sortAndShowSuggestions(e, results) {
    let splitCities = e.target.responseText.split('|');
    for (let i=0, c=splitCities.length; i<c; i++) {
        let eachCity = document.createElement('div');
        eachCity.textContent = splitCities[i];
        eachCity.tabIndex = i;
        results.appendChild(eachCity);
    }
}

function navigateSuggestions(results, search) {
    let allResults = results.childNodes;

    console.log(allResults);
    for (let i=0, c=allResults.length; i<c; i++) {
        allResults[i].addEventListener('keyup', (e)=> {

            if (e.target.nextElementSibling && e.keyCode===40) {
                e.target.nextElementSibling.focus();
            } else if (e.target.previousElementSibling && e.keyCode===38) {
                e.target.previousElementSibling.focus();
            } else if (e.keyCode===13) {
                search.value = e.target.textContent;
            }
        });
    }
}



