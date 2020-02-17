function loadFile(file) {
    var xhr = new XMLHttpRequest();

    xhr.open('GET', file);

    xhr.addEventListener('readystatechange', function() {
        
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200 || xhr.status === 0) {
            document.getElementById('fileContent').innerHTML = '<span>' + xhr.responseText + '<span>';
        } else if (xhr.readyState === XMLHTTPRequest.DONE && xhr.status !== 200) {
            alert('There is an errorr! \n\nCode :' + xhr.status + '\nText : ' + xhr.statusText);
        }
    });

    xhr.send(null);
}

(function() {

    var inputs = document.getElementsByTagName('input'), 
    inputsLen = inputs.length;

    for (let i=0; i < inputsLen; i++) {

        inputs[i].addEventListener('click', function () {
            loadFile(this.value);
        })
        
    }

})();

// Cross Origin Error cause AJAX only made to work with HTPS HTTPS and FTP protocols 

// we need a wrapper that acts as a server (to be installed)
