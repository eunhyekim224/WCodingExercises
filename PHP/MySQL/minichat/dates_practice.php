<?php
 try {
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(Exception $e) {
    die('Error: '. $e->getMessage());
}

// QUESTION 1 //
// Select messages for which the date is today 
// add data into your chat
echo '<br>Question 1</br>';
// $insert = $db->exec("INSERT INTO minichat(pseudo, message, date_creation) VALUES('Crumble', 'apples!', NOW())");

$response = $db->query("SELECT pseudo, message, date_creation FROM minichat WHERE date_creation BETWEEN '2020-03-01 00:00:00' AND '2020-03-02 00:00:00'");
while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['date_creation'];
}

// QUESTION 2 //
//Select messages from a specific time ( choose one into your database)
echo '<br>Question 2</br>';

$response = $db->query("SELECT pseudo, message, date_creation, HOUR(date_creation) as hour, MINUTE(date_creation) as minute FROM minichat WHERE HOUR(date_creation)=11 AND MINUTE(date_creation)=24");
while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['date_creation'];
}

// QUESTION 3 //
// Select messages with a date between hours (choose into your database)
echo '<br>Question 3</br>';

$response = $db->query("SELECT pseudo, message, date_creation FROM minichat WHERE date_creation BETWEEN '2020-03-01 11:00:00' AND '2020-03-02 12:00:00'");
while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['date_creation'];
}

// QUESTION 4 //
// insert messages manually from 2 days ago
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
// Retrieve the messages from 2 days ago into your table
echo '<br>Question 5</br>';

$response = $db->query("SELECT pseudo, message, date_creation, DAY(date_creation) as day, MONTH(date_creation) FROM minichat WHERE DAY(date_creation)=28 AND MONTH(date_creation)=02");

while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['date_creation'];
}


// QUESTION 6 //
// Retrieve the messages from 2 days ago with a precise hour into your table
echo '<br>Question 6</br>';

$response = $db->query("SELECT pseudo, message, date_creation, DAY(date_creation) as day, MONTH(date_creation) as month, HOUR(date_creation) as hour FROM minichat WHERE DAY(date_creation)=28 AND MONTH(date_creation)=02 AND HOUR(date_creation)=18");

while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['date_creation'];
}

// QUESTION 7 //
// Change into French format the date and display the first 20 messages into your database with this new format without the DATE_FORMAT function (DAY/MONTH/YEAR)
echo '<br>Question 7</br>';

$response = $db->query("SELECT pseudo, message, date_creation, DAY(date_creation) as day, MONTH(date_creation) as month, YEAR(date_creation) as year FROM minichat ORDER BY date_creation DESC LIMIT 0, 20");

while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['day'].'/'.$data['month'].'/'.$data['year'];
}

// QUESTION 8 //
// Change into French format the date and display the first 15 messages into your database with this new format with the DATE_FORMAT function
echo '<br>Question 8</br>';


$response = $db->query("SELECT pseudo, message, date_creation, DATE_FORMAT(date_creation, '%d/%m/%Y') AS date FROM minichat ORDER BY date_creation DESC LIMIT 0, 15");

while ($data = $response->fetch()) {
    echo $data['pseudo'].': '.$data['message']. ' '. $data['date'];
}

// QUESTION 9 //
// Change the display of your messages into your chat (the first 10 messages) by the message with an interval of 20 days
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

// $response = $db->query("SELECT pseudo, message, date_creation, DATE_SUB(date_creation, INTERVAL 20 DAY) AS twenty_days_ago FROM minichat ORDER BY date_creation DESC LIMIT 0, 10");

// while ($data = $response->fetch()) {
//     echo $data['pseudo'].': '.$data['message']. ' '. $data['date_creation'].' 20 days ago: '.$data['twenty_days_ago'];
// }
?>
    <div id="mainWrapper">
        <form action="http://localhost:8080/sites/sql_practice/minichat/chat.php" method="POST">
            <p>
                <label for="login">Login:</label>
                <input type="text" name="login" id="login"/>
            </p>
            <p>
                <label for="msg">Message:</label>
                <textarea name="msg" id="msg" cols=27 rows=6>Maximum 255 characters</textarea>
            </p>
            <p>
                <input type="submit" value="Send" />
                <input type="button" value="Refresh" id="refresh_btn">
            </p>
            <p>
                <label>Choose number of messages to display:</label>
                <input type="radio" name="options" value=10 checked/><label>10</label>
                <input type="radio" name="options" value=20><label>20</label>
                <input type="radio" name="options" value="all"><label>All</label>
            </p>
        </form>
        <div id="result">
            <?php
            //Connection to DB
            try {
                $db = new PDO('mysql: host=localhost; dbname=test; charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } catch (Exception $error) {
                die('Error: '.$error->getMessage());
            }
            
        
            $request = $db->query("SELECT pseudo, message, date_creation FROM minichat WHERE date_creation > DATE_SUB(DATE(NOW()), INTERVAL 20 DAY) ORDER BY date_creation");

            while($result = $request->fetch()) {
            echo '<p><strong>'.$result['pseudo'].':</strong> '.$result['message'].' ('.$result['date_creation'].')</p>';
            }
            $request->closeCursor();
            ?>
        </div>
    </div>
<?php
// QUESTION 10 //
// Add an expiration date to your message for 2 months after the date of add into the database.
echo '<br>Question 10</br>';

$response = $db->exec("UPDATE minichat SET date_creation = DATE_ADD(date_creation, INTERVAL 2 MONTH)");


?>



