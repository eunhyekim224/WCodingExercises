<!-- question 1 -->

<?php 
    $my_age = 10;
    $my_name = "Marie";
    $country = "Korea";
    $isWoman = true;

    if ($my_age > 3) {
        echo "You are really young... just " .$my_age ."years old";
    }
    else {
        echo 'it\'s okay you can continue on this webpage.';
    }

    if ($my_name == "Marie" AND $country == "Korea") {
        echo "Welcome to " .$country. ' ' .$my_name;
    }

    if (!$isWoman OR $my_name != "Marie") {
        echo "Who are you?";
    }
?>

<!-- Question 2 -->

<?php 
    $indice = 0;
    if ($indice=0) {
        echo "no pollution";
    } elseif ($indice=20) {
        echo "no pollution";
    } elseif ($indice=50) {
        echo "little pollution";
    } elseif ($indice=90) {
        echo "little pollution - wear a mask";
    } elseif ($indice=110) {
        echo "medium pollution - wear a mask";
    } elseif ($indice=140) {
        echo "medium pollution - wear a mask";
    } elseif ($indice=180) {
        echo "high pollution - wear a mask and no activities outside";
    } elseif ($indice=210) {
        echo "very high pollution - stay at home!";
    } elseif ($indice=250) {
        echo "very high pollution - stay at home!";
    } else {
        echo "no data entries - do what you want!";
    }

    switch ($indice) {
        case 0: echo "no pollution"; break;
        case 20: echo "no pollution"; break;
        case 50: echo "little pollution"; break;
        case 90: echo "little pollution - wear a mask"; break;
        case 110: echo "medium pollution - wear a mask"; break;
        case 140: echo "medium pollution - wear a mask"; break;
        case 180: echo "high pollution - wear a mask and no activities outside"; break;
        case 210: echo "very high pollution - stay at home!"; break;
        case 250: echo "very high pollution - stay at home!"; break;
        default: echo "no data entries - do what you want!"; break;
    }
?>  

<!-- Question 3 -->
<?php
    $password = "banana";
    echo $alert = ($password=="banana") ? "You have the good password ". $password . " you can enter" : "Wrong password, you can't enter";
?>

<!-- Question 4 -->
<?php
    $isEmployed = false;
    if (!$isEmployed) {
        echo "you have a job";
    } else {
        echo "no job";
    }
?>

