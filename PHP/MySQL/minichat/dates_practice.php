<?php
 try {
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(Exception $e) {
    die('Error: '. $e->getMessage());
}

// QUESTION 1 //
echo '<br>Question 1</br>';
// $insert = $db->exec("INSERT INTO minichat(pseudo, message, date_creation) VALUES('Crumble', 'apples!', NOW())");

$response = $db->query("SELECT pseudo, message, date_creation FROM minichat WHERE date_creation BETWEEN '2020-03-01 00:00:00' AND '2020-03-02 00:00:00'");
while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['date_creation'];
}

// QUESTION 2 //
echo '<br>Question 2</br>';

$response = $db->query("SELECT pseudo, message, date_creation, HOUR(date_creation) as hour, MINUTE(date_creation) as minute FROM minichat WHERE HOUR(date_creation)=11 AND MINUTE(date_creation)=24");
while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['date_creation'];
}

// QUESTION 3 //
echo '<br>Question 3</br>';

$response = $db->query("SELECT pseudo, message, date_creation FROM minichat WHERE date_creation BETWEEN '2020-03-01 11:00:00' AND '2020-03-02 12:00:00'");
while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['date_creation'];
}

// QUESTION 4 //
echo '<br>Question 4</br>';

$pseudo = 'Pie';
$message = 'Mushroom!';
$date_creation = date('y-m-d H:i:s', strtotime('-2 days'));

$insert = $db->prepare("INSERT INTO minichat(pseudo, message, date_creation) VALUES(:pseudo, :message, :date_creation)");
$insert->execute(array(
    'pseudo' => $pseudo,
    'message' => $message,
    'date_creation' => $date_creation
));

// QUESTION 5 //
echo '<br>Question 5</br>';

$response = $db->query("SELECT pseudo, message, date_creation, DAY(date_creation) as day, MONTH(date_creation) FROM minichat WHERE DAY(date_creation)=28 AND MONTH(date_creation)=02");

while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['date_creation'];
}


// QUESTION 6 //
echo '<br>Question 6</br>';

$response = $db->query("SELECT pseudo, message, date_creation, DAY(date_creation) as day, MONTH(date_creation) as month, HOUR(date_creation) as hour FROM minichat WHERE DAY(date_creation)=28 AND MONTH(date_creation)=02 AND HOUR(date_creation)=18");

while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['date_creation'];
}

// QUESTION 7 //
echo '<br>Question 7</br>';

$response = $db->query("SELECT pseudo, message, date_creation, DAY(date_creation) as day, MONTH(date_creation) as month, YEAR(date_creation) as year FROM minichat ORDER BY date_creation DESC LIMIT 0, 20");

while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['day'].'/'.$data['month'].'/'.$data['year'];
}

// QUESTION 8 //
echo '<br>Question 8</br>';


$response = $db->query("SELECT pseudo, message, date_creation, DATE_FORMAT(date_creation, '%d/%m/%Y') AS date FROM minichat ORDER BY date_creation DESC LIMIT 0, 15");

while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['date'];
}

// QUESTION 9 //
echo '<br>Question 9</br>';

// $pseudo = 'Meringe';
// $message = 'Lemon!';
// $date_creation = date('y-m-d H:i:s', strtotime('-20 days'));

// $insert = $db->prepare("INSERT INTO minichat(pseudo, message, date_creation) VALUES(:pseudo, :message, :date_creation)");
// $insert->execute(array(
//     'pseudo' => $pseudo,
//     'message' => $message,
//     'date_creation' => $date_creation
// ));

$response = $db->query("SELECT pseudo, message, date_creation, DATE_SUB(date_creation, INTERVAL 20 DAY) AS twenty_days_ago FROM minichat ORDER BY date_creation DESC LIMIT 0, 10");

while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['date_creation'].' 20 days ago: '.$data['twenty_days_ago'];
}

// QUESTION 10 //
echo '<br>Question 10</br>';

$response = $db->exec("UPDATE minichat SET date_creation = DATE_ADD(date_creation, INTERVAL 2 MONTH)");


?>

