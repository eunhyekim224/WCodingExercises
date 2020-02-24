<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registration Form</title>
    </head>
    <style>
        #allSections {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 100vh;
        }

        form {
            font-size: 1.5em;
            display: flex;
            flex-direction: column;
            padding-right: 100px;
        }

        select {
            width: 166px;
            height: 21.33px;
        }

        .alert {
            margin-left: 120px;
            border: solid 1px black;
            background-color: lightblue;
            border-radius: 6px;
            padding: 5px;
            visibility: hidden;
        }

        .greenBorder {
            border: solid 2px green;
        }

        .redBorder {
            border: solid 2px red;
        }

        .hidden {
            visibility: hidden;
        }

    </style>
    <body>   
        <div id="allSections">
            <form method="POST" action="http://localhost:8080/sites/exercises/form_1/view.php" id="myForm">
                <p id="gender"> Gender :
                    <input type="radio" name="gender" value="female" id="female">
                    <label for="female">Female</label>
                    <input type="radio" name="gender" value="male" id="male">
                    <label for="female">Male</label>
                    <span class="alert" >Please select a gender</span>
                </p>
                <p id="lastName"> 
                    <label for="lastNameText">Last name :</label>
                    <input type="text" name="lastNameText" id="lastNameText">
                    <span class="alert">A last name cannot be less than 2 characters</span>
                </p>
                <p id="firstName"> 
                    <label for="firstNameText">First name :</label>
                    <input type="text" name="firstNameText" id="firstNameText">
                    <span class="alert">A first name cannot be less than 2 characters</span>
                </p>
                <p id="age"> 
                    <label for="age">Age :</label>
                    <input type="text" name="ageText" id="ageText">
                    <span class="alert">The age has to be between 5 and 140</span>
                </p>
                <p id="login"> 
                    <label for="loginText">Login :</label>
                    <input type="text" name="loginText" id="loginText">
                    <span class="alert">The login ID cannot be less than 4 characters</span>
                </p>
                <p id="password"> 
                    <label for="passwordText">Password :</label>
                    <input type="password" name="passwordText" id="passwordText">
                    <span class="alert">The password cannot be less than 6 characters</span>
                </p>
                <p id="confirmPw"> 
                    <label for="confirmPwText">Confirm password :</label>
                    <input type="password" name="confirmPwText" id="confirmPwText">
                    <span class="alert">The password confirmation has to match the original one</span>
                </p>
                <p id="country">
                    <label for="countrySelect">Country :</label>
                    <select name="countrySelect" id="countrySelect">
                        <option value=null></option>
                        <option value="Korea">Korea</option>
                        <option value="Korea">United Kingdom</option>
                        <option value="Korea">Japan</option>
                        <option value="Korea">Egypt</option>
                    </select>
                    <span class="alert">You have to select your residence country</span>
                </p>
                <p id="newsletter">
                    <input type="checkbox" name="signUp" id="signUp">
                    <label for="signUp">I want to receive the newsletter every month</label>
                </p>
                <p id="buttons">
                    <input type="submit" value="Subscribe">
                    <input type="reset" value="Reset the form">
                </p>
            </form>
        </div>
        <script>
            (function() {
                let inputs = {
                    lastName: document.querySelector('#lastName input'),
                    firstName: document.querySelector('#firstName input'),
                    age: document.querySelector('#age input'),
                    login: document.querySelector('#login input'),
                    password: document.querySelector('#password input'),
                    confirmPassword: document.querySelector('#confirmPw input')
                }  

                let form = document.getElementById('myForm');
                let selectElem = document.getElementById('countrySelect');
                let radioElem = document.querySelectorAll('input[type="radio"');

                // ALERT FOR EACH INPUT

                // for radio input
                for (let i=0; i<radioElem.length; i++) {
                        radioElem[i].addEventListener('change', function(e) {
                            if (!radioElem[i].checked) {
                                radioElem[i].parentNode.lastElementChild.style = 'visibility: visible';
                                console.log( radioElem[i].nextElementSibling);
                            } else {
                                radioElem[i].parentNode.lastElementChild.removeAttribute('style');
                            }
                        });
                    }

                selectElem.addEventListener('change', function(e) {
                    let index = selectElem.selectedIndex;

                    if (index===0) {
                        selectElem.setAttribute('class', 'redBorder');
                        selectElem.nextElementSibling.style = 'visibility: visible';
                    } else if (index > 0){
                        selectElem.setAttribute('class','greenBorder');
                        selectElem.nextElementSibling.removeAttribute('style');
                    }

                });

                for (item in inputs) {
                    inputs[item].addEventListener('keyup', function(e) {
                        let inputTarget = e.target;
                        let alertTarget = inputTarget.nextElementSibling;
                        let inputValue = inputTarget.value;

                        function alertError(regexTest) {
                            if (regexTest || inputValue===undefined) {
                                inputTarget.setAttribute('class','redBorder');
                                alertTarget.style = 'visibility: visible';   
                            }
                        }
                        function removeError(regexTest) {
                            if (!regexTest) {
                                inputTarget.setAttribute('class','greenBorder');
                                alertTarget.removeAttribute('style');
                            }
                        }
                                        
                        if (inputTarget===inputs.lastName || inputTarget===inputs.firstName) {          
                            let lessThanTwoChar = /^[a-z]?$/;
                            let test = lessThanTwoChar.test(inputValue);
                            alertError(test);
                            removeError(test);
                        }
                        if (inputTarget===inputs.age) {
                            let test = inputValue >= 5 && inputValue <= 140;
                            alertError(!test);
                            removeError(!test);
                        }
                        if (inputTarget===inputs.login) {
                            let fourCharOrMore = /[a-z0-9]{4,}/i;
                            let test = !fourCharOrMore.test(inputValue)
                            alertError(test);
                            removeError(test);
                        }
                        if (inputTarget===inputs.password) {
                            let sixCharOrMore = /[a-z0-9]{6,}/i;
                            let test = !sixCharOrMore.test(inputValue)
                            alertError(test);
                            removeError(test);
                        }
                        if (inputTarget===inputs.confirmPassword) {
                            let test = inputs.password.value !== inputTarget.value
                            alertError(test);
                            removeError(test);
                        }     
                    });
                }
                // ON SUBMIT  

                form.addEventListener('submit', function(e) {

                    // e.preventDefault();

                    for (item in inputs) {
                        let eachInput = inputs[item];

                        //check value for all text inputs
                        if (!eachInput.value) {
                            eachInput.setAttribute('class','redBorder');
                            eachInput.nextElementSibling.style = 'visibility: visible'; 
                        }

                        //check value for select
                    
                    }

                    let index = selectElem.selectedIndex;

                    if (index===0) {
                        selectElem.setAttribute('class', 'redBorder');
                        selectElem.nextElementSibling.style = 'visibility: visible';
                    } else if (index > 0){
                        selectElem.setAttribute('class','greenBorder');
                        selectElem.nextElementSibling.removeAttribute('style');
                    }

                    console.log(radioElem);
                    for (let i=0; i<radioElem.length; i++) {
                        if (!radioElem[i].checked) {
                            radioElem[i].parentNode.lastElementChild.style = 'visibility: visible';
                            console.log( radioElem[i].nextElementSibling);
                        } else {
                            radioElem[i].parentNode.lastElementChild.removeAttribute('style');
                        }
                    }
                });

                // ON RESET

                form.addEventListener('reset', function(e) {
                    for (item in inputs) {
                        let eachInput = inputs[item];
                        eachInput.removeAttribute('class');
                        eachInput.nextElementSibling.removeAttribute('style')
                    }           
                    selectElem.removeAttribute('class');
                    selectElem.nextElementSibling.removeAttribute('style')

                    for (let i=0; i<radioElem.length; i++) {
                        radioElem[i].parentNode.lastElementChild.removeAttribute('style');
                    }
                });
            })();
            //if there is an error, add input.class = 'red'
            //if it passes, add input.class = 'green'

            //add event handlers on all input texts
            //create regex objects as tests for the inputs 
            //if regex.test(input.value), add 'green' class 
            //if regex.test(input.value) === false, add 'red' class and display error msg 

            //error msgs
            //create empty divs next to input texts 
            //add css for divs (border, background color)
            //when regex.test(input.value) === false


            //add events for select and radio 
            //function alerts to go global 
            //check pw both ways 
        </script>
        <?php include('exercise.php'); ?>
    </body>
</html>