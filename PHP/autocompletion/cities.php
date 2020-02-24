<?php
    $frenchCities = unserialize(file_get_contents("./towns.txt"));       
    $numOfFrenchCities = count($frenchCities);

    matchCities($frenchCities, $numOfFrenchCities);

    function matchCities($cities, $numOfCities) {
        $matchedCities = array();
        for ($i=0; $i<$numOfCities AND count($matchedCities)<10; $i++) {
            if (isset($_GET['searchCity']) AND stripos($cities[$i], $_GET['searchCity']) === 0) {
                array_push($matchedCities, $cities[$i]);
            }
        }
        sort($matchedCities);      
        echo implode('|', $matchedCities);   
    }  
?>
