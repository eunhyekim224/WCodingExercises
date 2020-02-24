// EXECUTION //
autoComplete();
///////////////

function autoComplete() {
    let searchInput = document.querySelector('#searchCity');
    let results = document.querySelector('#results');

    searchInput.addEventListener('keyup', (e) => {
        if (e.keyCode == 40) {
            results.firstElementChild.focus();
            makeNavigatable(results.childNodes, searchInput);
        }
        else {
            loadMatchedCities(e, results, searchInput);
        }
    });
}

function makeNavigatable(resultItems, search) {

    for (let i = 0; i < resultItems.length; i++) {
        var item = resultItems[i];
        item.addEventListener('keyup', (e) => {
            if (e.target.nextElementSibling && e.keyCode === 40) {
                e.target.nextElementSibling.focus();
            } else if (e.target.previousElementSibling && e.keyCode === 38) {
                e.target.previousElementSibling.focus();
            } else if (e.keyCode === 13) {
                search.value = e.target.textContent;
            }
        });
    }
}

function loadMatchedCities(event, results, searchInput) {
    let xhr = new XMLHttpRequest();
    xhr.open('get', 'http://localhost:8080/sites/exercises/autocompletion/cities.php?searchCity=' + encodeURIComponent(event.target.value));
    xhr.send(null);
    xhr.addEventListener('load', (e) => {
        results.innerHTML = '';
        sortAndShowSuggestions(e, results, searchInput);
    });
}

function sortAndShowSuggestions(e, results, searchInput) {
    let splitCities = e.target.responseText.split('|');
    for (let i = 0, c = splitCities.length; i < c; i++) {
        let eachCity = document.createElement('div');
        eachCity.textContent = splitCities[i];
        eachCity.tabIndex = i;
        results.appendChild(eachCity);

        eachCity.addEventListener('click', (e) => {
            searchInput.value = e.target.textContent;
        });

      
    }

    makeNavigatable(results.childNodes, searchInput);
}

function goToSuggestions(results) {
    results.firstElementChild.focus();
}




